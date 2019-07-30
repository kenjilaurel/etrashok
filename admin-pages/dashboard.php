<?php include '../template/header.php' ?>
<title>Dashboard</title>
<body class="animsition">
    <div class="page-wrapper">
       <?php include '../template/navigation-admin.php'; ?>

            <!-- MAIN CONTENT-->
            <div class="main-content" style="padding-top: 116px;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- WELCOME-->
					            <section class="welcome p-t-10">
					                <div class="container">
					                    <div class="row">
					                        <div class="col-md-12">
					                            <h1 class="title-4">Welcome back
					                                <span>Admin! - <?php echo $_SESSION['login_user']; ?>!</span>
					                            </h1>
					                            <hr class="line-seprate">
					                        </div>
					                    </div>
					                </div>
					            </section>
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5>Dashboard Coming Soon!</h5>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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