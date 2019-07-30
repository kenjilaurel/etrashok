<?php  include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<title>List of violation</title>
<body class="animsition">
    <div class="page-wrapper">
        
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
                                        <li class="list-inline-item">Dashboard</li>
                                         <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                 
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
          
          <section>
              <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        

                          <div class="card-body">     
                           <div class="top-campaign">
                                   
                                    
                                         <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back <?php echo $_SESSION['login_user']; ?>!</h1>
                            
                        </div>
                    </div>
                </div>
            </section>
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