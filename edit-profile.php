<?php include ('headers/header.php'); ?>

<?php
    
    $result = db_query("SELECT * FROM users WHERE username = '$user'");

     $row = mysqli_fetch_array($result);

if( isset($_POST['btn-edit-profile']) ) {
  

  $username = trim($_POST['username']);
  $username = strip_tags($username);
  $username = htmlspecialchars($username);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $password = trim($_POST['password']);
  $password = strip_tags($password);
  $password = htmlspecialchars($password);

  $confirmpassword = trim($_POST['confirmpassword']);
  $confirmpassword = strip_tags($confirmpassword);
  $confirmpassword = htmlspecialchars($confirmpassword);

  if ($password != $confirmpassword) { // password validation
      # code...
      $errMSG = "Password and Confirm Password doesn't match.";
     } else {
        

        // password encrypt using SHA256();
  $passwod = hash('sha256', $password);

  $result = db_query("UPDATE users SET username = '$username', email = '$email', password = '$passwod' WHERE username = '$user'");
  if ($result == 1) {
    $errMSG = " Records Updated!";
  }
  else {
    $errMSG = "Something went wrong, try again later..."; 
  } 
     }
}



 ?>

 
      




<div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
       <div class="content-header-left col-md-6 offset-md-3 mb-1">
            <h2 class="content-header-title">Edit Profile</h2>
        </div>
      </div>
      <div class="content-body"><!-- stats -->
        <div class="row match-height">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                    </ul>
                </div>
            </div>
              <div class="card-block">

                <div >
                  <?php

                   echo "
                    <p class=' alert-success'>$errMSG</p>
                    ";
                  ?>
                </div>

            <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="form-body">
                  <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" id="" value="<?php echo $user; ?>" class="form-control" placeholder="Username" name="username">
                  </div>

                  <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" id="" value="<?php echo $row["email"]; ?>" class="form-control" placeholder="Email" name="email">
                      </div>

                       <div class="form-group">
                          <label for="">Password</label>
                          <input type="password" id="" class="form-control" placeholder="Password" name="password">
                      </div>

                      <div class="form-group">
                          <label for="">Confirm Password</label>
                          <input type="password" id="" class="form-control" placeholder="Confirm Password" name="confirmpassword">
                      </div>
              <div class="form-actions center">
                <button type="submit" name="btn-edit-profile" class="btn btn-primary">
                  <i class="icon-check2"></i> Submit
                </button>
              </div>
            </form>
          </div>
              </div>
            </div>
          </div>


<?php include ('footers/footer.php'); ?>
