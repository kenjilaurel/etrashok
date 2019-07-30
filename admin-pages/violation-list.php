<?php include '../template/header.php' ?>
<title>Violation</title>
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
                                        <li class="list-inline-item">Laws & Policies</li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">List of violation</li>
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
                                    <div class="card-header">Violation Detail</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Fill up the Fields</h3>
                                        </div>
                                        <hr>
                                        <form action="../api/admin-violation.php" method="post" >
                                            <div class="form-group">
                                                <label for="cc-sitio" class="control-label mb-1">Description</label>
                                                <textarea class="form-control" name="description" placeholder="Write the violation description here"></textarea>
                                            </div>                                       
                                        	<div class="row form-group">
                                                <div class="col col-md-4 text-right">
                                                    <label for="select-leader" class=" form-control-label ">Penalty &nbsp; &#8369;</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="Number" name="penalty" class="form-control" placeholder="0.00" step='0.01'>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="btn-sitio-save" name="save_violation" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-save"></i>&nbsp;
                                                   SAVE
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- col 6 -->
                              <div class="col-lg-6">
                                
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">List of Violation</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign sitio-table">
                                            <tbody>
                                            	<?php 
                                            	$sql = "SELECT id,
                                            					description,
                                            					penalty
                                            					FROM violation WHERE deleted = 0";
                                            	$result = mysqli_query($mysqli,$sql);
				                                if (mysqli_num_rows($result) > 0) {         
				                                	$count = 0;                           
				                                    while($row = mysqli_fetch_assoc($result)) {
				                                    	$penalty = number_format((float)$row['penalty'], 2, '.', '');
				                                    	$count++;
				                                    	echo '<tr onclick="javascript:showViolationModal(this);">';
				                                    	echo '<td>'.$count.'</td>';
				                                    	echo '<td class="hide-td">'.$row['id'].'</td>';				
				                                    	echo '<td>'.$row['description'].'</td>';
				                                    	echo '<td>&#8369; '.$penalty.'</td>';
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
                                
                            </div><!-- col 6-->
                        </div><!-- row -->
                  
                    </div><!-- container Fluid -->
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

        <!-- Modal Area-->
        <div class="modal fade" id="violationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelSitio" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    	<h4 class="modal-title" id="myModalLabelSitio">EDIT/DELETE VIOLATION</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        
                    </div>
                    <div class="modal-body">
                    	                   
                    <form action="../api/admin-violation.php" method="post" >
                    	<!-- hidden value -->
                    	<input type="hidden" name="violation_id" id="violation_id">
                         <div class="form-group">
                            <label for="cc-sitio" class="control-label mb-1">Description</label>
                            <textarea id="vio-desc" class="form-control" name="description" placeholder="Write the violation description here"></textarea>
                        </div>                                       
                    	<div class="row form-group">
                            <div class="col col-md-4 text-right">
                                <label for="select-leader" class=" form-control-label ">Penalty &nbsp; &#8369;</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input id="penalty" type="Number" name="penalty" class="form-control" placeholder="0.00" step='0.01'>
                            </div>
                        </div>
                        
                        <div>
                        	<div class="row">
                        		<div class="col-lg-6">
                        			<button id="btn-sitio-delete2" type="submit" name="delete_violation" class="btn btn-lg btn-danger btn-block">
		                                <i class="fa fa-ban"></i>&nbsp;
		                               DELETE
		                            </button>
                        		</div>
                        		<div class="col-lg-6">
                        			<button id="btn-sitio-save2" type="submit" name="edit_violation" class="btn btn-lg btn-info btn-block">
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
    	
		 //modal
		 function showViolationModal(row){
		 	var x=row.cells;
		 	var id = x[1].innerHTML;
		 	var desc = x[2].innerHTML;
		 	var penalty = x[3].innerHTML;
		 	var result = penalty.split(" ");
		 	// console.log(result[1]);
		 	$("#violation_id").val(id);
		 	$("#vio-desc").val(desc);
		 	$("#penalty").val(result[1]);
		 	
		  	$('#violationModal').modal({show:true}); 
		  }
    </script>