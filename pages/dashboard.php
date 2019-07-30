
<?php include '../template/header.php'; ?>

<title>Dashboard</title>
</head>	
<body class="animsition">
    <div class="page-wrapper">
       
       <!-- navigation -->
       <?php include '../template/navigation.php'; ?>
       <?php
        $user_role = $_SESSION['login_role'];
        if($user_role == 2){
            $user_role = "Collector";
        }else if($user_role == 3){
            $user_role = "Residence";
        }else if($user_role == 4){
            $user_role = "Facilitator";
        }else{
            $user_role = "You have not yet assigned a role";
        }
        ?>
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
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back
                                <span><?php echo $_SESSION['login_user']; ?>!</span><br>
                                <span style="font-size: 18px;">You're role is:<span style="color: #365cad;"> <?php echo $user_role; ?></span></span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

          <section>
              <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                      <p>Dashboard Coming Soon!</p>
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
        </div>

    </div>

  <?php include '../template/footer.php' ?>