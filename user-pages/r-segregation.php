<?php  include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<link rel="stylesheet" type="text/css" href="../css/dropzone.css">
<title>Segregation</title>
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
                                            <a href="#">Waste Management</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Segregation</li>
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
                      		<?php
                      			$sql = "SELECT  id,
                      							category,
                      							description,
                      							image_path
                      							FROM waste_category WHERE deleted = 0";
                      			$result = mysqli_query($mysqli,$sql);
                                if (mysqli_num_rows($result) > 0) {  
                                	while($row = mysqli_fetch_assoc($result)) {   
                                		$rimage = $row['image_path'];                             		
                                		?>
                                		<div class="row">
                                			<div class="col-md-2 text-center">
                                				<img class="img-fluid left-img" src="../images/<?php echo $rimage;?>">
                                			</div>
                                			<div class="col-md-10">
                                				<div class="form-group">   
		                                			<div class="upload-header">
		                                			<label style="margin-bottom: 0;border-bottom: 1px solid #FFC107;"><?php echo $row['category']; ?></label><br>
									                <label style="font-size: 14px;"><?php echo $row['description']; ?></label>	
		                                			</div>                                			
									                <div class="file_upload">
									                  <form action="../api/r-upload-segragation.php" class="dropzone">
									                  	<input type="hidden" name="category_id" value="<?php echo $row['id']; ?>">									                  	
									                    <div class="dz-message needsclick">
									                      <strong>Drop files here or click to upload.</strong><br />
									                      <span class="note needsclick">(If multiple please upload it in order. )</span>
									                    </div>
									                  </form>
									                </div>
									              </div> 
                                			</div>
                                		</div>
                                		
                                		<?php
                                	}
                                }
                      		?>
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
    <script type="text/javascript" src="../js/dropzone.js"></script>
    <?php  include '../template/footer.php'; ?>