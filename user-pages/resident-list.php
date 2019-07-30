<?php  include '../template/header.php'; ?>
<?php error_reporting(1); ?>

<title>List of resident</title>
<style type="text/css">
    .table>tbody>tr>td {vertical-align: middle}
</style>
<body class="animsition">
    <div class="page-wrapper">
        
    	<?php include '../template/navigation-user.php'; ?>
        <?php $role = $_SESSION['login_role']; ?>
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
                                        <li class="list-inline-item">List of resident</li>
                                         
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
                                    <h3 class="title-3 m-b-30">List of Resident</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign sitio-table">
                                            <tbody>
                                            	<?php 
                                            	$sql = "SELECT user.id uid,
                                                                firstname,
                                                                middlename,
                                                                lastname,
                                                                sitio,
                                                                sitio_name,
                                                                image_path,
                                                                address_brgy,
                                                                address_street_house,
                                                                address_city
                                                                FROM user 
                                                                INNER JOIN sitio 
                                                                ON user.sitio = sitio.id
                                                                WHERE user.deleted = 0 AND user_role = 3";
                                                if($role == 2){
                                                    $usitio = $_SESSION['user_sitio'];
                                                    $sql .= " AND sitio = '$usitio'";
                                                    
                                                }
                                                
                                            	$result = mysqli_query($mysqli,$sql);
				                                if (mysqli_num_rows($result) > 0) {         
				                                	$count = 0;                           
				                                    while($row = mysqli_fetch_assoc($result)) {
				                                    	
				                                    	$count++;
                                                        $name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
                                                        $address = $row['address_street_house'].' '.$row['address_brgy'].' '.$row['address_city'];
                                                        $image = '../images/'.$row['image_path'];

				                                    	echo '<tr >';
				                                    	echo '<td>'.$count.'</td>';
				                                    	echo '<td><img src="'.$image.'" class="img-fluid" style="height:65px;" /></td>';			
				                                    	echo '<td>'.$name.'</td>';
                                                        echo '<td>'.$address.'</td>';
				                                    	echo '<td><span class="color-black" style="font-weight: 400;">Sitio: </span>'.$row['sitio_name'].'</td>';
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