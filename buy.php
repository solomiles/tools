<?php include ('headers/header.php'); ?>


<?php
    // get buyerDetails
    function buyerDetails(){
      global $user;
      $result = db_query("SELECT * FROM users WHERE username = '$user'");

     $row = mysqli_fetch_array($result);
     return $row;
    }

     function productInformation(){

      $item_id = $_GET['item_id'];
       return $item_id;
     }

     // die(productInformation());

     // get sellerDetails
      function sellerDetails(){

      $get_item_id = productInformation();

      $result = db_query("SELECT * FROM shell AND cpanels AND accounts AND cards AND email_list AND mailers AND scam_pages AND scripts AND smtps AND tools AND tutorials AND vps WHERE Item_id = '$get_item_id'");
       // print_r($result);
      $row = mysqli_fetch_array($result);

      $seller_name = $row['Seller'];

      $check = db_query("SELECT * FROM users WHERE username = '$seller_name'");

      $ok = mysqli_fetch_array($check);

     return $ok;
     }
?>


<div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
       <div class="content-header-left col-md-6 offset-md-3 mb-1">
            <h2 class="content-header-title">Payment Information</h2>
        </div>
      </div>
      <div class="content-body"><!-- stats -->
        <div class="row match-height">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-header">
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
                <div>
                      <h4>Seller Details</h4>
                      <hr>
                      <p>Name: <?php echo sellerDetails()['username']; ?></p>
                      <p>Email: <?php echo sellerDetails()['email']; ?></p>
                 </div>
                 <br>
                  <div>
                      <h4>Buyer Details </h4>
                      <hr>
                      <p>Name: <?php echo buyerDetails()['username']; ?></p>
                      <p>Email: <?php echo buyerDetails()['email']; ?></p>
                  </div>
                    <br>
                  <div>
                      <h4>Product Information </h4>
                      <hr>

                  </div>
                  <br>

                  <button type="submit" class="btn btn-danger btn-lg btn-block"><i class="icon-unlock2"></i> Make Payment</button>
          </div>
              </div>
            </div>
          </div>
  
  <?php include('footers/footer.php'); ?>
