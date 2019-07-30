<?php  include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<title>Violation and penalty</title>
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
                                        <li class="list-inline-item">Violation & Penalty</li>
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
                                    <h3 class="title-3 m-b-30">My Violation & Penalties</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign sitio-table">
                                            <thead>
                                                <th>No.</th>
                                                <th>Date collected</th>
                                                <th>Category</th>
                                                <th>Remarks</th>
                                                <th>Violation</th>
                                                <th>Penalty</th>
                                                <th>Collector</th>
                                            </thead>
                                            <tbody>
                                            	<?php 
                                            	$sql = "SELECT 
                                                                rs.id rsid,
                                                                wc.category wccat,
                                                                remarks,
                                                                firstname,
                                                                middlename,
                                                                lastname,
                                                                v.description vdesc,
                                                                penalty,
                                                                date_collected
                                                                FROM resident_segragation rs
                                                                INNER JOIN waste_category wc
                                                                ON rs.category_id = wc.id
                                                                INNER JOIN segregation_remarks sr
                                                                ON rs.segregation_remarks_id = sr.id
                                                                INNER JOIN user 
                                                                ON sr.collector_id = user.id
                                                                INNER JOIN violation v
                                                                ON sr.violation_id = v.id
                                                                WHERE resident_id = 10 AND
                                                                segregation_remarks_id != 0 
                                                                AND collected != 0
                                                                GROUP BY segregation_remarks_id";

                                            	$result = mysqli_query($mysqli,$sql);
				                                if (mysqli_num_rows($result) > 0) {         
				                                	$count = 0;                           
				                                    while($row = mysqli_fetch_assoc($result)) {
				                                    	$penalty = number_format((float)$row['penalty'], 2, '.', '');
				                                    	$count++;
                                                        $collector = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];

				                                    	echo '<tr >';
				                                    	echo '<td>'.$count.'</td>';
				                                    	echo '<td>'.$row['date_collected'].'</td>';		
                                                        echo '<td>'.$row['wccat'].'</td>';	
                                                        echo '<td>'.$row['remarks'].'</td>';
                                                        echo '<td>'.$row['vdesc'].'</td>';				                       
                                                        echo '<td>&#8369; '.$penalty.'</td>';
                                                        echo '<td>'.$collector.'</td>';
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