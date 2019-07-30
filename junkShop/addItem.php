<?php include '../template/header.php' ?>
<title>Add New Item</title>
<body class="animsition">
    <div class="page-wrapper">
        <?php include '../template/navigation-junkshop.php'; ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                                    <div class="section__content section__content--p30">
                                         <div id="alertContainer"></div>
                    <div class="container-fluid">
                       <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="card">
                                    <div class="card-header">Add Item</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Please Enter Details</h3>
                                        </div>
                                        <hr>
                                         <form id="junkform" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category</label>
                                                  <select class="form-control" id="wasteCat">
                                                   
                                                 
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
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa  fa-check fa-lg"></i>&nbsp;
                                                    <span>Save</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
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
             $("#payment-button").click(function(event){
                event.preventDefault();
                var category = $('#wasteCat').val();
                var desc = $('#wasteDesc').val();
                var price = $('#wastePrice').val();
                if (price == "" || desc == "") {
                  $( "#alertContainer" ).empty();
                  $( "#alertContainer" ).append( "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <strong>Price Field and Description is Required!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>" );
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
                            $("#junkform")[0].reset();
                             $( "#alertContainer" ).empty();
                             $( "#alertContainer" ).append( "<div class='alert alert-success alert-dismissible fade show' role='alert'> <strong>"+data["msg"]+"!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>" );
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
    </script>