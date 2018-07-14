<?php include ('headers/header.php'); ?>

<?php

if( isset($_POST['btn-script']) ) {
  


  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $description = trim($_POST['description']);
  $description = strip_tags($description);
  $description = htmlspecialchars($description);  

  $price = trim($_POST['price']);
  $price = strip_tags($price);
  $price = htmlspecialchars($price);

  $seller = trim($_POST['seller']);
  $seller = strip_tags($seller);
  $seller = htmlspecialchars($seller);

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



  $result = db_query("INSERT INTO scripts(Name,Item_id,Description,Price,Seller) VALUES('$name','$item_id','$description','$price','$seller')");
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
    $result = db_query("SELECT * FROM scripts");
    return $result; 
  }

?>

<div class="app-content content container-fluid">
      <div class="content-wrapper">


<div class="content-header row">
       <div class="content-header-left col-md-6 offset-md-3 mb-1">
            <h2 class="content-header-title">Add Scripts</h2>
        </div>
      </div>
      <div class="content-body"><!-- stats -->
        <div class="row match-height">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Add Scripts</h5>
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
                  <label for="">Name</label>
                  <input type="text" id="" class="form-control" placeholder="Name" name="name">
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea id="" rows="5" class="form-control square" name="description" placeholder="Description"></textarea>
                </div> 
              
              <div class="form-group">
                  <label for="">Price</label>
                  <input type="number" id="" class="form-control" placeholder="Price" name="price">
                </div>

                <div class="form-group">
                  <label for="">Seller</label>
                  <input type="text" id="" value="<?php echo $user ?>" class="form-control" placeholder="Seller" name="seller">
                </div>

              <div class="form-actions center">
                <button type="submit" name="btn-script" class="btn btn-primary">
                  <i class="icon-plus"></i> Add
                </button>
              </div>
            
          </div></form>
              </div>
            </div>
          </div>
        </div>
      </div><br>


      <div class="card">
        
        <div class="card-body">
                <div class="card-block">
                    <div class="media">
                      <p class="card-text"><font color="red"><b>Please Click <a data-action="expand"><i class="icon-maximize"></i></a> To See Full Information .</b></font></p>

                      <table id="example" class="table table-striped table-bordered table-responsive table-hover table-condensed" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Verification</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Seller</th>
                                <th>Added On</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                      <tbody>
                         <? while ( mysqli_fetch_assoc(show_table()) ) : ?>

                          <?php foreach ( show_table() as $row) :?>

                          <tr>
                              <td><?php echo $row['Item_id']; ?></td>
                              <td><span class="tag tag-success tag-pil"><?php echo $row['Verification']; ?></span></td>
                              <td><?php echo $row['Name']; ?></td>
                              <td><?php echo $row['Description']; ?></td>
                              <td>$<?php echo $row['Price']; ?></td>
                              <td><?php echo $row['Seller']; ?></td>
                              <td><?php echo $row['Created_at']; ?></td>
                              <td> 
                                <div class="row">
                                  <div class="col-xs-6">
                                    <div class="">
                                      <a href="#"><button type='button' class='btn btn-block btn-primary btn-sm'>Edit</button></a>
                                    </div> 
                                    <div class="">
                                    <a href="#"><button type='button' class='btn btn-block btn-danger btn-sm'>Delete</button></a>
                                    </div>
                                  </div>
                                </div>
                              </td>
                          </tr>

                        <?php endforeach;?>

                       <? endwhile; ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

      </div>


      <?php include ('footers/footer.php'); ?>