<?php  include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<title>Report - Violation</title>
<style type="text/css">
    .changeFont {
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol" !important; 
    }
</style>
<body class="animsition">
    <div class="page-wrapper">
        
        <?php include '../template/navigation-admin.php'; ?>
            <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Report</li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Violation</li>
                                    </ul>
                                </div>                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
        

          <section class="p-t-60 p-b-20">
            <div class="container">
                <div class="row">
                   <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Barangay Daliao Resident Request Tab</h4>
                      <p></p>
                      <hr>
                      <p class="mb-0">Residents that requested <b>Barangay Clearance</b>.</p>
                    </div>
                   </div>

                </div>
                <div class="row">
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = "SELECT a.id,b.firstname,b.middlename,b.lastname FROM `clearance` as a INNER JOIN user as b ON a.userId = b.id";

    $result = mysqli_query($mysql2,$sql);
     // <button class="btn btn-primary btn-xs" id="editClearance" clearID="'.$row["id"].'">
     //    <i class="fa fa-pencil-square-o"></i>Edit
     //  </button>
     // <button class="btn btn-danger btn-xs" id="deleteClearance" clearID="'.$row["id"].'">
     //    <i class="fas fa-trash-alt"></i>Delete
     //  </button
                                                if (mysqli_num_rows($result) > 0) {         
                                                    $count = 0;                           
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        $count++;
                                                        echo '<tr >';               
                                                        echo '<td>'.$count.'</td>';
                                                        echo '<td>'.$row["firstname"].'</td>';
                                                        echo '<td>'.$row["middlename"].'</td>';
                                                        echo '<td>'.$row["lastname"].'</td>';
                                                        echo ' <td>
     <button class="btn btn-danger btn-xs" id="deleteClearance" clearID="'.$row["id"].'">
        <i class="fas fa-trash-alt"></i>Delete
      </button
    </td>';
                                                        echo '</tr>';
                                                    }
                                                }else{
                                                    echo "<tr><td>No Result Found.</td></tr>";
                                                }

    ?>
  </tbody>
</table>
                </div>
            </div>
          </section>
         
            <!-- END DATA TABLE-->
             <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- end of page content -->

    </div>
    <?php  include '../template/footer.php'; ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
             $("#deleteClearance").click(function(){
                var clearanceID = $(this).attr("clearID")

                  $.ajax({
                      url: "../api/clearanceAction.php",
                      data: {
                          'clearanceID' : clearanceID
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
        });
    </script>
   <!--  <script type="text/javascript">
     jQuery(document).ready(function($) {
       $("#reqClearnace").click(function(){
       //ajax request
       var login_id = "<?php echo $_SESSION['login_id'] ?>";
          $.ajax({
              url: "../api/processClearance.php",
              data: {
                  'userId' : login_id
              },
              dataType: 'json',
              success: function(data) {
                if (data["status"] == true) {
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
      });
     });
   </script>
    -->