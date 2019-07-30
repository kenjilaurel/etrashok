<?php include '../template/header.php' ?>
<title>Sitio</title>
<body class="animsition">
    <div class="page-wrapper">
       <?php include '../template/navigation-admin.php'; ?>
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
                                        <li class="list-inline-item">Sitio</li>
                                    </ul>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- MAIN CONTENT-->
            <div class="main-content" id="sitio-page">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Sitio & Leader Detail</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Fill up the Fields</h3>
                                        </div>
                                        <hr>
                                        <form action="../api/admin-sitio.php" method="post" >
                                            <div class="form-group">
                                                <label for="cc-sitio" class="control-label mb-1">Sitio Name</label>
                                                <input id="cc-sitio" name="sitio" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>                                       
                                        	<div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="select-leader" class=" form-control-label">Sitio Leader</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <select name="sitio_leader" id="select-leader" class="form-control">
                                                     <?php 
                                                     	$sql = "SELECT id,
                                                     					firstname,
                                                     					middlename,
                                                     					lastname 
                                                     					FROM user WHERE deleted = 0 ";                                                     
							                                $result = mysqli_query($mysqli,$sql);
							                                if (mysqli_num_rows($result) > 0) {                                    
							                                    while($row = mysqli_fetch_assoc($result)) {
						                                       		$id = $row['id'];
						                                       		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];					                                        
						                                            echo '<option value="'.$id.'">'.$name.'</option>';
							                                    	  
							                                    }
							                                }else{
							                                	echo '<option> User is Empty. </option>';
							                                }
                                                      ?>	
                                                    </select>
                                                    <!-- <input type='button' value='Seleted option' id='but_read'> -->
													<br/>
													<!-- <div id='result'></div> -->
                                                </div>
                                            </div>
                                            <div>
                                                <button id="btn-sitio-save" name="save_sitio" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-save"></i>&nbsp;
                                                   SAVE
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- col 6 -->
                              <div class="col-lg-6">
                                <!-- SITIO-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">List of Sitio & Leaders</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign sitio-table">
                                            <tbody>
                                            	<?php 
                                            	$sqlr = "SELECT sitio_name,
                                            					sitio.id id,
                                            					leader,
                                            					firstname,
                                            					middlename,
                                            					lastname 
                                            					FROM sitio
                                            					INNER JOIN user 
                                            					ON sitio.leader = user.id 
                                            					WHERE sitio.deleted = 0";
                                            	$resultr = mysqli_query($mysqli,$sqlr);
				                                if (mysqli_num_rows($resultr) > 0) {         
				                                	$count = 0;                           
				                                    while($rowr = mysqli_fetch_assoc($resultr)) {
				                                    	$name = $rowr['firstname'].' '.$rowr['middlename'].' '.$rowr['lastname'];
				                                    	$count++;
				                                    	echo '<tr onclick="javascript:showSitioModal(this);">';
				                                    	echo '<td>'.$count.'</td>';
				                                    	echo '<td class="hide-td">'.$rowr['id'].'</td>';
				                                    	echo '<td class="hide-td">'.$rowr['leader'].'</td>';
				                                    	echo '<td>'.$rowr['sitio_name'].'</td>';
				                                    	echo '<td>'.$name.'</td>';
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
                                <!--  END SITIO-->
                            </div><!-- col 6-->
                        </div><!-- row -->
                  
                    </div><!-- container Fluid -->
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

        <!-- Modal Area-->
        <div class="modal fade" id="sitioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelSitio" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    	<h4 class="modal-title" id="myModalLabelSitio">EDIT/DELETE SITIO</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        
                    </div>
                    <div class="modal-body">
                    	                   
                    <form action="../api/admin-sitio.php" method="post" >
                    	<!-- hidden value -->
                    	<input type="hidden" name="sitio_id" id="sitio_id">
                        <div class="form-group">
                            <label for="cc-sitio2" class="control-label mb-1">Sitio Name</label>
                            <input id="cc-sitio2" name="sitio" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                        </div>                                       
                    	<div class="row form-group">
                            <div class="col col-md-4">
                                <label for="select-leader2" class=" form-control-label">Sitio Leader</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <select name="sitio_leader" id="select-leader2" class="form-control">
                                 <?php 
                                 	$sql = "SELECT id,
                                 					firstname,
                                 					middlename,
                                 					lastname 
                                 					FROM user WHERE deleted = 0 ";                                                     
		                                $result = mysqli_query($mysqli,$sql);
		                                if (mysqli_num_rows($result) > 0) {                                    
		                                    while($row = mysqli_fetch_assoc($result)) {
	                                       		$id = $row['id'];
	                                       		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];					                                        
	                                            echo '<option value="'.$id.'">'.$name.'</option>';
		                                    	  
		                                    }
		                                }else{
		                                	echo '<option> User is Empty. </option>';
		                                }
                                  ?>	
                                </select>
                                <!-- <input type='button' value='Seleted option' id='but_read'> -->
								<br/>
								<!-- <div id='result'></div> -->
                            </div>
                        </div>
                        <div>
                        	<div class="row">
                        		<div class="col-lg-6">
                        			<button id="btn-sitio-delete2" type="submit" name="delete_sitio" class="btn btn-lg btn-danger btn-block">
		                                <i class="fa fa-ban"></i>&nbsp;
		                               DELETE
		                            </button>
                        		</div>
                        		<div class="col-lg-6">
                        			<button id="btn-sitio-save2" type="submit" name="edit_sitio" class="btn btn-lg btn-info btn-block">
		                                <i class="fa fa-save"></i>&nbsp;
		                               SAVE
		                            </button>
                        		</div>
                        	</div>
                            
                        </div>
                    </form>
                </div><!-- modal body -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- -->
    </div>
    <?php include '../template/footer.php' ?>
    <script type="text/javascript">
    	$(document).ready(function(){
 
		  // Initialize select2
		  $("#select-leader").select2();

		  // // Read selected option
		  // $('#but_read').click(function(){
		  //   var username = $('#select-leader option:selected').text();
		  //   var userid = $('#select-leader').val();

		  //   $('#result').html("id : " + userid + ", name : " + username);

		  // });

		 
		 
		});
		 //modal
		 function showSitioModal(row){
		 	var x=row.cells;
		 	var id = x[1].innerHTML;
		 	var leader = x[2].innerHTML;
		 	var sitio = x[3].innerHTML;

		 	$("#sitio_id").val(id);
		 	$("#cc-sitio2").val(sitio);
		 	$("#select-leader2").val(leader);
		 	
		  	$('#sitioModal').modal({show:true}); 
		  }
    </script>