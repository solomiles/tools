
<?php include ('headers/header.php'); ?>

<?php


if( isset($_POST['btn-ticket']) ) {
  


  $from = trim($_POST['from']);
  $from = strip_tags($from);
  $from = htmlspecialchars($from);

  $description = trim($_POST['description']);
  $description = strip_tags($description);
  $description = htmlspecialchars($description);  

  $service = trim($_POST['service']);
  $service = strip_tags($service);
  $service = htmlspecialchars($service);

  $subject = trim($_POST['subject']);
  $subject = strip_tags($subject);
  $subject = htmlspecialchars($subject);

  function generateRandomString($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$item_id = generateRandomString();



  $result = db_query("INSERT INTO tickets(Ticket_from,Ticket_no,Service,Subject,Description) VALUES('$from','$item_id','$service','$subject','$description')");
  if ($result == 1) {
    $errMSG = " Saved Successfully!";
  }
  else {
    $errMSG = "Something went wrong, try again later..."; 
  } 
}


?>
<?php


  
function show_table(){
  global $user;
    $result = db_query("SELECT * FROM tickets WHERE Ticket_from = '$user'");
    return $result; 
  }


?>



<div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
       <div class="content-header-left col-md-6 offset-md-3 mb-1">
            <h2 class="content-header-title">Create Ticket</h2>
        </div>
      </div>
      <div class="content-body"><!-- stats -->
        <div class="row match-height">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Create Ticket</h5>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="expand"><i class="icon-maximize"></i></a></li>
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
                  <div class="form-group">
                    <label>From:</label>
                  <input type="text" id="" value="<?php echo $user ?>" class="form-control" placeholder="Username or Email" name="from">
                </div>

                   <label>Service</label>
                      <select id="" name="service" class="form-control">
                          <option>Choose Service</option>
                          <option value="I want to be a seller" title="I want to be a seller">I want to be a seller</option>
                        </select>
                      </div> 

                <div class="form-group">
                  <label for="">Subject</label>
                  <input type="text" id="" class="form-control" placeholder="Subject" name="subject">
                </div>
              </div>

                <div class="form-group">
                  <label>Description of Service or Product:</label>
                  <textarea id="" rows="5" class="form-control square" name="description" placeholder="Description of Service or Product"></textarea>
                </div>

              <div class="form-actions center">
                <button type="submit" name="btn-ticket" class="btn btn-primary">
                  <i class="icon-check2"></i> Submit Ticket
                </button>
              </div>
            </form>
          </div>
              </div>
            </div>
          </div><br>

          <div class="card">
              <div class="card-header">
                <h5 class="card-title">Ticket List</h5>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="expand"><i class="icon-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
              <div class="card-body">
                <div class="card-block">
                    <div class="media">
                      <p class="card-text"><font color="red"><b>Please Click <a data-action="expand"><i class="icon-maximize"></i></a> To See Full Information .</b></font></p>

                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service</th>
                                <th>Subject</th>
                                <th>Description of Service or Product</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                      <tbody>
                        <?php $ok = mysqli_fetch_assoc(show_table()) ?>

                          <?php foreach ( show_table() as $row) :?>
                          <tr>
                              <td><?php echo $row['Ticket_no']; ?> </td>
                              <td><?php echo $row['Service']; ?> </td>
                              <td><?php echo $row['Subject']; ?> </td>
                              <td><?php echo $row['Description']; ?> </td>
                              <td><span class="btn mr-1 mb-1 btn-success btn-sm">Approved</span>
                                <span class="btn mr-1 mb-1 btn-warning btn-sm">Pending</span></td>
                          </tr>

                        <?php endforeach;?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


<!-- end page content -->

  <?php include ('footers/footer.php'); ?>
 
