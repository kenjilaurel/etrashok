<?php include '../template/header.php' ?>
<title>Price List</title>
<body class="animsition">
    <div class="page-wrapper">
      <?php include '../template/navigation-junkshop.php'; ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                                                <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id = "alertContainer">Edit</h4>
        </div>
        <div class="modal-body">
           <form id="junkform" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category</label>
                                                  <select class="form-control" id="wasteCat" name = "selWaste">
                                                   
                                                 
                                                    <?php 
                                                    $sql1 = "SELECT `id`, `category`  FROM `waste_category` WHERE 1";
                                                                $result1 = mysqli_query($mysql2,$sql1);
                                                                if (mysqli_num_rows($result1) > 0) {         
                                                                                          
                                                                    while($row = mysqli_fetch_assoc($result1)) {                                                        
                                                                         echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
                                                                    }
                                                                }

                                                   ?>                 
                                                  </select>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Description</label>
                                                <input id="wasteDesc" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the Description"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Price</label>
                                                <input id="wastePrice" name="cc-number" type="number" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            <div>
                                                <button id="update-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa  fa-check fa-lg"></i>&nbsp;
                                                    <span>Update</span>
                                                </button>
                                            </div>
                                        </form>
        </div>
        <!-- end modal body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 





                                                    <!-- Modal -->
  <div class="modal fade" id="newModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id = "newModalalertContainer">Add</h4>
        </div>
        <div class="modal-body">
           <form id="newModalform" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category</label>
                                                  <select class="form-control" id="wasteCat" name = "selWaste">
                                                   
                                                 
                                                    <?php 
                                                    $sql1 = "SELECT `id`, `category`  FROM `waste_category` WHERE 1";
                                                                $result1 = mysqli_query($mysql2,$sql1);
                                                                if (mysqli_num_rows($result1) > 0) {         
                                                                                          
                                                                    while($row = mysqli_fetch_assoc($result1)) {                                                        
                                                                         echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
                                                                    }
                                                                }

                                                   ?>                 
                                                  </select>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Description</label>
                                                <input id="wasteDesc" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the Description"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Price</label>
                                                <input id="wastePrice" name="cc-number" type="number" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            <div>
                                                <button id="addNewButton" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa  fa-check fa-lg"></i>&nbsp;
                                                    <span>Save</span>
                                                </button>
                                            </div>
                                        </form>
        </div>
        <!-- end modal body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 



  <!-- end of modal -->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="alert alert-dark" role="alert">
                                  Junk Shop Price List
                                </div>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button id = "addNewJunk" type="button" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item</button>
                                    </div>
                                </div>
                               

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                
                                                <th>category</th>
                                                <th>description</th>
                                                <th>date</th>
                                                <th>price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php 
                                                $sql = "SELECT a.id,a.category as junkCat,b.category as cat,a.description,a.created,a.price FROM junkTable as a INNER JOIN waste_category as b ON a.category = b.id";
                                                $result = mysqli_query($mysqli,$sql);
                                                if (mysqli_num_rows($result) > 0) {                                  
                                                    while($row = mysqli_fetch_assoc($result)) {                                                        
                                                        echo '<tr class="tr-shadow">';
                                                        
                                                        echo '<td>'.$row['cat'].'</td>';
                                                        echo '<td class="desc">'.$row['description'].'</td>';
                                                        echo '<td>'.$row['created'].'</td>';
                                                        echo '<td>'.$row['price'].'</td>';
                                                        echo '<td>';
                                                        echo '<div class="table-data-feature">';
                                                        echo '<button class="item openModal" data-toggle="tooltip" data-placement="top" title="Edit" selectedCat = '.$row['junkCat'].' selDesc = '.$row['description'].' selPrice = '.$row['price'].' upId = '.$row['id'].'>
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>';
                                                        echo '<button class="item deleteJunk" junkId = '.$row['id'].' data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>';
                                                        
                                                        echo '</div>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                                        echo '<tr class="spacer"></tr>';
                                                    }
                                                }else{
                                                    echo "<tr><td>No Result Found.</td></tr>";
                                                }
                                            ?>
                                       
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Etrashok. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <?php include '../template/footer.php' ?>
    <script type="text/javascript">
           jQuery(document).ready(function($) {


            $("#addNewJunk").click(function(){
               $("#newModal").modal();


                $("#addNewButton").click(function(event){
                event.preventDefault();
            
                var category = $('#newModal select[name=selWaste]').val();
                var desc = $("#newModal input[id='wasteDesc']").val();
                var price = $("#newModal input[id='wastePrice']").val();

                if (price == "" || desc == "") {

                  $( "#newModal h4[id=newModalalertContainer]" ).empty();
                    $( "#newModal h4[id=newModalalertContainer]" ).append( "<div id='myAlertNew' class='alert alert-danger alert-dismissible fade show' role='alert'> <strong>Price Field and Description is Required!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>" );
                    $('#newModal').on('close.bs.alert', function () {
                        $( "#newModal h4[id=newModalalertContainer]" ).empty();
                        $( "#newModal h4[id=newModalalertContainer]" ).html("Edit");
                    });

                }
                else {
                      $.ajax({
                      url: "../api/processJunkItem.php",
                      data: {
                          'category' : category,
                          'desc' : desc,
                          'price' : price
                      },
                      dataType: 'json',
                      success: function(data) {
                        if (data["status"] == true) {
                                $('#newModal').modal('hide');
                                location.reload(true);
                            }
                            else {
                              $( "#newModal h4[id=newModalalertContainer]" ).empty();
                              $( "#newModal h4[id=newModalalertContainer]" ).append( "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <strong>"+data["msg"]+"!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>" );
                            }

                      },
                      error: function(data){
                          //error
                      }
                  });
                }
               

                
                
                


            });


            });


             $(".deleteJunk").click(function(){
                var junkID = $(this).attr("junkId")
                  $.ajax({
                      url: "../api/deleteJunk.php",
                      data: {
                          'junkID' : junkID
                      },
                      dataType: 'json',
                      success: function(data) {
                        console.log(data)
                         location.reload(true);

                      },
                      error: function(data){
                          //error
                      }
                  });


            });
            $(".openModal").click(function(){
                $("#myModal").modal();
                var selectedW = $(this).attr("selectedCat");
                var selectedDesc = $(this).attr("selDesc");
                var selectedPrice = $(this).attr("selPrice");
                var upId = $(this).attr("upId");
                $('#myModal select[name=selWaste]').val(selectedW);
                $("#myModal input[id='wasteDesc']").val(selectedDesc);
                $("#myModal input[id='wastePrice']").val(selectedPrice);



                $("#update-button").click(function(event){
                event.preventDefault();
                var category = $('#myModal select[name=selWaste]').val();
                var desc = $("#myModal input[id='wasteDesc']").val();
                var price = $("#myModal input[id='wastePrice']").val();

                if (price == "" || desc == "") {
                  $( "#alertContainer" ).empty();
                  $( "#alertContainer" ).append( "<div id='myAlert' class='alert alert-danger alert-dismissible fade show' role='alert'> <strong>Price Field and Description is Required!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>" );
                    $('#myAlert').on('closed.bs.alert', function () {
                        $( "#alertContainer" ).empty();
                         $( "#alertContainer" ).html("Edit")
                    });
                }
                else {
                   
                    var category = $('#myModal select[name=selWaste]').val();
                    var desc = $("#myModal input[id='wasteDesc']").val();
                    var price = $("#myModal input[id='wastePrice']").val();
                    console.log(upId);
                    console.log(category);
                    console.log(desc);
                    console.log(price);
                     $.ajax({
                      url: "../api/updateJunk.php",
                      data: {
                        'upId' : upId,
                        'category' : category,
                        'desc' : desc,
                        'price' : price
                      },
                      dataType: 'json',
                      success: function(data) {
                        console.log(data);
                        if (data["status"] = true) {
                             $('#myModal').modal('hide');
                             location.reload(true);
                        }
                        else {
                            $( "#alertContainer" ).empty();
                            $( "#alertContainer" ).append( "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <strong>"+data["msg"]+"!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>" );
                        }
                        
                      },
                      error: function(data){
                          //error
                      }
                  });
                }
                
            });
             


                
            });
           

        });
    </script>