<?php
 ob_start();
 session_start();
 
  require'dbconnect.php';

if ( isset($_SESSION['user'])) {
  header("location: index.php");
 }

 $error = false;
 
 $errMSG='';
 
 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $username = trim($_POST['username']);
  $username = strip_tags($username);
  $username = htmlspecialchars($username);
  
  $password = trim($_POST['password']);
  $password = strip_tags($password);
  $password = htmlspecialchars($password);
  
  $cpassword = trim($_POST['cpassword']);
  $cpassword = strip_tags($cpassword);
  $cpassword = htmlspecialchars($cpassword);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
 
  // basic username validation
  if (empty($username)) {
   $error = true;
   $errMSG = "Please enter your username.";
  } else if (strlen($username) < 7) {
   $error = true;
   $errMSG = "userame must have at least 7 characters.";
  }
  // die($username);
   // password validation
  if (empty($password)){
   $error = true;
   $errMSG = "Please enter password.";
  } else if(strlen($password) < 6) {
   $error = true;
   $errMSG = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $passwod = hash('sha256', $password);
   // echo $password;

  
   
 
  // password encrypt using SHA256();
  // $password = hash('sha256', $cpass);
  
  
  //basic email validation
  function db_query($query){ 
    $connection = db_connect();
    $result = mysqli_query($connection,$query);

  return $result;
}


  $today_date = Date('Y-m-d H:i:s');
  // die($today_date);
  
    $rest = db_query("SELECT * FROM users  ");
    $check = mysqli_fetch_array($rest);
    $checkemail = $check['email'];
    $checkuser = $check['username'];
    if ($checkemail === $email) {
      # code...
      $errMSG = 'Email already in use';
    } elseif ($checkuser === $username) {
      # code...
      $errMSG = 'Username already in use';
    } elseif ($password != $cpassword) { // password validation
      # code...
      $errMSG = "Password and Confirm Password doesn't match.";
     }
    // elseif (strlen($fullname) < 7) {
    //   # code...
    //   $errMSG = "full name must contain alphabets and space.";
    // }  
     else if(strlen($password) < 8) {
     $error = true;
     $errMSG = "Password must have at least 8 characters.";
     } 
    // elseif (!p_match("/^[a-zA-Z ]+$/",$fullname)) {
    //   # code...
    //   $error = true;
    //   $errMSG = "full name must contain alphabets and space.";
    // }
     else  {

    $result = db_query("INSERT INTO users(username,email,password) VALUES('$username','$email','$passwod')");
    
   if ($result == 1) {
    $errMSG = "success! you may login now";

    header("Location: home.php");
    // echo $errTyp;
    // echo $errMSG;
   }
    else {
    $errMSG = "Something went wrong, try again later..."; 
   } 
  }
 }
?>


<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Toolz.pz | Signup</title>
    <link rel="apple-touch-icon" sizes="60x60" href="app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
     <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
		<div class="card border-grey border-lighten-3 px-2 py-2 m-0">
			<div class="card-header no-border">
				<div class="card-title text-xs-center">
					<img src="app-assets/images/logo/logo.png" alt="Toolz.PM">
				</div>
				<h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Create Account</span></h6>
			</div>
			<div class="card-body collapse in">	
				<div class="card-block">
           <?php echo "<p class=' alert-danger'>$errMSG</p>"; ?>
					<form class="form-horizontal form-simple" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
						<fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="text" name="username" class="form-control form-control-lg input-lg" id="user-name" placeholder="User Name" required>
							<div class="form-control-position">
							    <i class="icon-head"></i>
							</div>
						</fieldset>
						<fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="email" name="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Your Email Address" required>
							<div class="form-control-position">
							    <i class="icon-mail6"></i>
							</div>
						</fieldset>
						<fieldset class="form-group position-relative has-icon-left mb-1">
							<input type="password" name="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Enter Password" required>
							<div class="form-control-position">
							    <i class="icon-key3"></i>
							</div>
						</fieldset>
            <fieldset class="form-group position-relative has-icon-left">
              <input type="password" name="cpassword" class="form-control form-control-lg input-lg" id="user-password" placeholder="Confirm Password" required>
              <div class="form-control-position">
                  <i class="icon-key3"></i>
              </div>
            </fieldset>
						<button type="submit" name="btn-signup" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Register</button>
					</form>
				</div>
				<p class="text-xs-center">Already have an account ? <a href="login.php" class="card-link">Login</a></p>
			</div>
		</div>
	</div>
</section>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="../../app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="../../app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="../../app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="../../app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
