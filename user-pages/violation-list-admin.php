<?php include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<title>Approved Users</title>
</head> 
<body class="animsition" id="user-page">
    <div class="page-wrapper">
       
       <!-- navigation -->
       <?php include '../template/navigation-admin.php'; ?>

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
           <!--Message -->
           <?php include '../snippet/system-message.php'; ?>
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
                                        <li class="list-inline-item">User</li>
                                         <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Approved</li>
                                    </ul>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->


            <!-- Main content-->
            <div class="main-content">
                <section class="p-t-20">
                    <div class="container">
                        <div class="row">
                          
                        </div>
                    </div>
                </section>
            </div>
              <!-- modal Student -->
            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelUser" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #fff3cd;">
                            <h4 class="modal-title" id="myModalLabelUser">User Approval Detail </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            
                        </div>
                        <form action="../api/user-api.php" method="post" >

                            <div class="modal-body user-modal-body">
                                 
                            </div><!--modal body -->
                            <div class="modal-footer">                                  

                                 <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                                                                 
                                 <input type="submit"   name="submitUpdate" class="btn btn-primary" value="Save">            
                            </div>
                       </form>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
          <!-- modal -->

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
        </div>

    </div>

  <?php include '../template/footer.php' ?>
  