<?php  include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<title>Barangay Clearance</title>
<style type="text/css">
  .select2{
    width: 200px !important;
  }
</style>
<body class="animsition">
    <div class="page-wrapper">
        <div id="alertContainer"></div>
      <?php include '../template/navigation-user.php'; ?>
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
                                        <li class="list-inline-item">Certificate</li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Barangay Clearance</li>
                                    </ul>
                                </div>                               
                            </div>
                         
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
        

          <section>
              <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                          Barangay Clearance Requirements                   
                          </div>

                          <div class="card-body">     
                              <div class="row">
                                <div class="col-md-6">
                                  <ul class="list-group">
                                    <li class="list-group-item">1. Recent Cedula (Community Tax Certificate)</li>
                                    <li class="list-group-item">2. Application Form</li>
                                    <li class="list-group-item">3. Application Fee (price vary depending on the Barangay)</li>
                                  </ul>
                                </div>
                              </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6"><button type="button" class="btn btn-primary pull-right" id="reqClearnace">Request</button></div>
                                  </div>
                              
                            
                         
                          </div>
                        </div> 
                    </div>
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