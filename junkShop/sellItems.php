<?php include '../template/header.php' ?>
<title>Price List</title>
<body class="animsition">
    <div class="page-wrapper">
      <?php include '../template/navigation-junkshop.php'; ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
  <!-- end of modal -->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="alert alert-dark" role="alert">
                                  Junk Shop Price List
                                </div>
                                <div id="alertContainer"></div>

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-borderless">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Quantity</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Confirm</th>
                                    </tr>
                                  </thead>
                                  <tbody>


                                
                                            <?php 
                                                $sql = "SELECT a.id,b.description as name,a.quantity,a.price,a.confirm FROM `junkitemsell` as a 
INNER JOIN junktable as b ON a.subcategoryID = b.subCategoryID GROUP BY a.id";
                                                $result = mysqli_query($mysqli,$sql);
                                                if (mysqli_num_rows($result) > 0) {                                  
                                                    while($row = mysqli_fetch_assoc($result)) {  
                                                        if ($row['confirm'] == 0) {
                                                            echo '<tr>'; 
                                                        }                        
                                                        else {
                                                            echo '<tr class="table-success">';
                                                        }
                                                        echo '<td>'.$row['id'].'</td>';
                                                        echo '<td>'.$row['name'].'</td>'; 
                                                        echo '<td>'.$row['quantity'].'</td>';
                                                        echo '<td>'.$row['price'].'</td>';
                                                        if ($row['confirm'] == 0) {
                                                             echo '<td><button class="item buyJunk" junkId = '.$row['id'].' data-toggle="tooltip" data-placement="top" title="Buy">
                                                           <i class="fas fa-shopping-basket"></i>
                                                        </button></td>';
                                                        }
                                                        else {
                                                             echo '<td><button class="item cancelbuyJunk" junkId = '.$row['id'].' data-toggle="tooltip" data-placement="top" title="Cancel">
                                                           <i class="fas fa-strikethrough"></i>
                                                        </button></td>';
                                                        }
                                                       
                                                        echo '</tr>';
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
               $(".buyJunk").click(function(event) {
                    

                    $.ajax({
                      url: "../api/updateSellItems.php",
                      data: {
                        'upId' : $(this).attr('junkId'),
                        'upValue' : 1
                      },
                      dataType: 'json',
                      success: function(data) {
                        if (data["status"] == true) {
                                location.reload(true);
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

               });

               $(".cancelbuyJunk").click(function(event) {
                    

                    $.ajax({
                      url: "../api/updateSellItems.php",
                      data: {
                          'upId' : $(this).attr('junkId'),
                          'upValue' : 0
                      },
                      dataType: 'json',
                      success: function(data) {
                        if (data["status"] == true) {
                                location.reload(true);
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

               });

        });
    </script>