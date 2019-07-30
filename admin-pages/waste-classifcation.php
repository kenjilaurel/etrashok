<?php include '../template/header.php' ?>
<title>Waste Classification</title>
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
                                        <li class="list-inline-item">Waste Classification</li>
                                       
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
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-header">Class Detail</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Fill up the Fields</h3>
                                        </div>
                                        <hr>
                                        <form action="../api/admin-waste-class.php" method="post" >                                            
                                            <div class="form-group">
                                                <label for="select-leader" class=" form-control-label ">Class Name</label>
                                                <input type="text" name="class_name" placeholder="Write Waste Class here..." id="waste-class" class="form-control">
                                            </div>                                            
                                            <div class="form-group">
    											<label class="fw">Select category
    											<select name="category" id="select-sitio" class="form-control">
                                                 <?php 
                                                 	$sql = "SELECT id,
                                                 					category FROM 
                                                 					waste_category WHERE deleted = 0 ";                                                     
						                                $result = mysqli_query($mysqli,$sql);
						                                if (mysqli_num_rows($result) > 0) {                                    
						                                    while($row = mysqli_fetch_assoc($result)) {
					                                       		$id = $row['id'];
					                                       		$name = $row['category'];					                                        
					                                            echo '<option value="'.$id.'">'.$name.'</option>';
						                                    	  
						                                    }
						                                }else{
						                                	echo '<option> Category is Empty. </option>';
						                                }
                                                  ?>	
                                                </select>
                                            	</label>
    										</div>                                      
                                            
                                            <div>
                                                <button  name="save_class" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-save"></i>&nbsp;
                                                   SAVE
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- col 6 -->
                              <div class="col-lg-7">
                                <!-- SITIO-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">List of Waste & Classification</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign sitio-table">
                                            <tbody>
                                                <?php 
                                                $sql = "SELECT wcl.id id,
                                                                category,
                                                                waste_category_id wci
                                                                FROM waste_class wcl
                                                                INNER JOIN waste_category wct
                                                                ON wcl.waste_category_id = wct.id
                                                                WHERE wcl.deleted = 0 
                                                                GROUP BY waste_category_id";
                                                $result = mysqli_query($mysqli,$sql);
                                                if (mysqli_num_rows($result) > 0) {         
                                                    $count = 0;                           
                                                    while($row = mysqli_fetch_assoc($result)) {     	
                                                    	$cateid = $row['wci'];   
                                                        $count++;
                                                        echo '<tr>';
                                                        
                                                        echo '<td>'.$count.'</td>';
                                                        echo '<td class="hide-td">'.$row['id'].'</td>';             
                                                        echo '<td>'.$row['category'].'</td>';
                                                        echo '<td>';
                                                        echo '<table>';
                                                        $sqlc = "SELECT wcl.id id,
	                                                                name,
	                                                                waste_category_id wci
	                                                                FROM waste_class wcl
	                                                                INNER JOIN waste_category wct
	                                                                ON wcl.waste_category_id = wct.id
	                                                                WHERE wcl.deleted = 0 
	                                                                AND waste_category_id = '$cateid'";
	                                                        
                                                        $resultc = mysqli_query($mysqli,$sqlc);
                                                		if (mysqli_num_rows($resultc) > 0) {   
                                                			while($rowc = mysqli_fetch_assoc($resultc)) {   
                                                                
                                                    ?>
                                                    	
                                                    		<tr  onclick="javascript:showWasteModal(this);">
                                                    			<td class="hide-td"><?php echo $rowc['id']; ?></td>
                                                    			<td class="hide-td"><?php echo $rowc['wci']; ?></td>
                                                    			<td><?php echo $rowc['name']; ?></td>
                                                    			<td>
                                                    				<i class="fa fa-edit"></i>
                                                    			</td>
                                                    		</tr>
                                                    
                                                        
                                                    <?php

                                                			}
                                                		}
                                                		echo '	</table>';
                                                		//end of loop of  class
                                                		echo '</td>';
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
        <div class="modal fade" id="wasteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelSitio" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabelSitio">EDIT/DELETE CLASS</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        
                    </div>
                    <div class="modal-body">
                                           
                    <form action="../api/admin-waste-class.php" method="post" >
                        <!-- hidden value -->
                        <input type="hidden" name="class_id" id="class_id">
                        
                       <div class="form-group">
	                        <label for="select-leader" class=" form-control-label ">Class Name</label>
	                        <input type="text" name="class_name" placeholder="Write Waste Class here..." id="wasteclass" class="form-control">
	                    </div>                                            
	                    <div class="form-group">
							<label class="fw">Select category
							<select name="category" id="selectcategory" class="form-control">
	                         <?php 
	                         	$sql = "SELECT id,
	                         					category FROM 
	                         					waste_category WHERE deleted = 0 ";                                                     
	                                $result = mysqli_query($mysqli,$sql);
	                                if (mysqli_num_rows($result) > 0) {                                    
	                                    while($row = mysqli_fetch_assoc($result)) {
	                                   		$id = $row['id'];
	                                   		$name = $row['category'];					                                        
	                                        echo '<option value="'.$id.'">'.$name.'</option>';
	                                    	  
	                                    }
	                                }else{
	                                	echo '<option> Category is Empty. </option>';
	                                }
	                          ?>	
	                        </select>
	                    	</label>
						</div>                 
                        
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button  type="submit" name="delete_class" class="btn btn-lg btn-danger btn-block">
                                        <i class="fa fa-ban"></i>&nbsp;
                                       DELETE
                                    </button>
                                </div>
                                <div class="col-lg-6">
                                    <button  type="submit" name="edit_class" class="btn btn-lg btn-info btn-block">
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
          $("#select-sitio").select2();
          $("#select-category").select2();
         //modal
         function showWasteModal(row){
            var x=row.cells;
            var id = x[0].innerHTML;
            var cat = x[1].innerHTML;
            var wclass = x[2].innerHTML;
            
            console.log(cat);
            console.log(wclass);
            console.log(id);
            // console.log(result[1]);
            $("#class_id").val(id);
            $("#wasteclass").val(wclass);
            $("#selectcategory").val(cat);
                        
            $('#wasteModal').modal({show:true}); 
          }
    </script>