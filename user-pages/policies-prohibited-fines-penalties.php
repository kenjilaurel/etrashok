<?php  include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<title>Fines & Penalty</title>
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
                                        <li class="list-inline-item">Laws & Policies</li>
                                         <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Prohibited Acts Fines & Penalties</li>
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
            <?php
            $id = 1;
            $sql = "SELECT title,description FROM laws_policies WHERE id = 1";
            $result = mysqli_query($mysqli,$sql);
            if (mysqli_num_rows($result) > 0) {         
                               
                while($row = mysqli_fetch_assoc($result)) {
                    $title = $row['title'];
                    $desc  = $row['description'];
                }
            }
            ?>
          <section>
              <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                           <?php echo $title; ?>                             
                          </div>

                          <div class="card-body">     
                            <div class="form-control" style="padding-top: 1em;">
                                <?php echo $desc; ?>    
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