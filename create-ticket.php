<?php


  
// function show_table(){
//     $result = db_query("SELECT * FROM scam_pages");
//     return $result; 
//   }

?>


<?php include ('headers/header.php'); ?>


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
            <form class="form">
              <div class="form-body">

                <div class="form-group">
                  <div class="form-group">
                    <label>From:</label>
                  <input type="text" id="" class="form-control" placeholder="Username or Email" name="from">
                </div>

                   <label>Service</label>
                      <select id="" name="country" class="form-control">
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
                <button type="submit" class="btn btn-primary">
                  <i class="icon-check2"></i> Submit Ticket
                </button>
              </div>
            </form>
          </div>
              </div>
            </div>
          </div>


<!-- end page content -->

  <?php include ('footers/footer.php'); ?>
 
