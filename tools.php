
<?php include ('headers/header.php'); ?>
<?php


  
function show_table(){
    $result = db_query("SELECT * FROM tools");
    return $result; 
  }

?>



<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
     <div class="content-header-left col-md-6 col-xs-12 mb-1">
          <h2 class="content-header-title">Tools</h2>
      </div>
    </div>
    <div class="content-body"><!-- stats -->
      <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Tools</h5>
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
                          <th>Buy</th>

                      </tr>
                  </thead>
                <tbody>
                  
                        <?php $ok = mysqli_fetch_assoc(show_table()) ?>
                          <?php foreach ( show_table() as $row) :?>

                          <tr>
                              <td><?php echo $row['Item_id']; ?> </td>
                              <td><span class="tag tag-success tag-pil"><?php echo $row['Verification']; ?></span></td>
                              <td><?php echo $row['Name']; ?></td>
                              <td><?php echo $row['Description']; ?></td>
                              <td>$<?php echo $row['Price']; ?></td>
                              <td><?php echo $row['Seller']; ?></td>
                              <td><?php echo $row['Created_at']; ?></td>
                              <td><?php echo "<a href='buy.php?item_id={$row["Item_id"]}'> <button type='button' class='btn btn-block btn-secondary btn-sm'>Buy</button></a> "?></td>
                          </tr>

                        <?php endforeach;?>


                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>


<!-- end page content -->

  <?php include ('footers/footer.php'); ?>
 


