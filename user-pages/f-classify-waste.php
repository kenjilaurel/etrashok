<?php  include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<link rel="stylesheet" type="text/css" href="../css/dropzone.css">
<link rel="stylesheet" href="../dist/css/lightbox.min.css">
<title>Classify Waste</title>
<style type="text/css">
	#accordion{
		margin-bottom: 0.5em;
	}
    .inner4{
        margin-right: 0;
        margin-left: 0;

    }
    .form-control2{
        display: block;
        
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .inner-table td{
        padding: 0 !important;
    }
    .inner-table td input{
        width: 90%;
    }
    .inner-table{
        background: #fff;
    }
    .bgwhite{
        background: #fff;
        padding: 1em;
        margin-bottom: 1em;
    }
</style>
<body class="animsition" id="collection-page">
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
                                    <li class="list-inline-item">Classify collected waste</li>
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
                        <h4>Collected waste from resident</h4>
                        <hr/>
                        <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <?php 
                                        $sql = "SELECT rs.id rsid,            
                                                firstname,
                                                middlename,
                                                lastname,
                                                user.id uid,
                                                sr.collector_id srcollectionId,
                                                sr.remarks srremarks,
                                                sr.violation_id srviolation,
                                                sr.date_collected srdate,
                                                sr.id srid
                                                FROM resident_segragation rs
                                                INNER JOIN user ON rs.resident_id = user.id
                                                INNER JOIN waste_category wc ON rs.category_id = wc.id 
                                                INNER JOIN segregation_remarks sr ON rs.segregation_remarks_id = sr.id
                                                WHERE rs.deleted = 0
                                                AND rs.collected = 1  
                                                GROUP BY srcollectionId ORDER BY firstname ASC";
                                        $result = mysqli_query($mysqli,$sql);
                                        if (mysqli_num_rows($result) > 0) {         
                                            $count = 0;                       
                                            while($row = mysqli_fetch_assoc($result)) {                                         
                                                $count++;
                                                
                                                //addtnl
                                               
                                                $srdate         = $row['srdate'];
                                                $srcollectionId = $row['srcollectionId'];                                    
                                                $collector 		= getUserName($mysqli,$srcollectionId);
                                            ?>
                                                 <tr class="tr-shadow">                                               
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <?php 
                                                                echo '<span class="rname color-black">'.$count.'. '.$collector.'</span>'; 
                                                                echo '<br>';
                                                                echo '<span style="padding-left:1em;">Date collected: </span>';
                                                                echo '<br>';
                                                                echo '<span style="padding-left:1em;">'.$srdate.'</span>';
                                                                ?>
                                                            </div>
                                                            <div class="col-md-10">
                                                            	<?php 
                                                            	 $sqlresident = "SELECT rs.id rsid,            
				                                                    firstname,
				                                                    middlename,
				                                                    lastname,
				                                                    user.id uid,
				                                                    sr.collector_id srcollectionId,
				                                                    sr.remarks srremarks,
				                                                    sr.violation_id srviolation,
				                                                    sr.date_collected srdate,
				                                                    sr.id srid
				                                                    FROM resident_segragation rs
				                                                    INNER JOIN user ON rs.resident_id = user.id
				                                                    INNER JOIN waste_category wc ON rs.category_id = wc.id 
				                                                    INNER JOIN segregation_remarks sr ON rs.segregation_remarks_id = sr.id
				                                                    WHERE rs.deleted = 0
				                                                    AND rs.collected = 1  AND sr.collector_id = '$srcollectionId'
				                                                    GROUP BY lastname ORDER BY firstname ASC";
				                                                  
				                                                $resultresident = mysqli_query($mysqli,$sqlresident);
                                        						if (mysqli_num_rows($resultresident) > 0) {         
                                            						$countinner = "{$count}". 0;   
                                                                    
                                            						while($rowrsdt = mysqli_fetch_assoc($resultresident)) { 
                                            							$countinner++;
					                                                    $srremarks      = $rowrsdt['srremarks'];
					                                                    $srviolation    = $rowrsdt['srviolation'];
					                                                    $srid           = $rowrsdt['srid'];
					                                                    $name = $rowrsdt['firstname'].' '.$rowrsdt['middlename'].' '.$rowrsdt['lastname'];
                                                						$resident_id = $rowrsdt['uid'];
                                            						
                                                            	?>
                                                                 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                                      <h4 class="panel-title">
                                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $countinner; ?>" aria-expanded="true" aria-controls="collapse<?php echo $countinner; ?>" title="Click to display">
                                                                          Resident: <?php echo $name; ?>
                                                                        </a>
                                                                      </h4>
                                                                    </div>
                                                                    <div id="collapse<?php echo $countinner; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                      <div class="panel-body">
                                                                       <?php
                                                                       $g_facilitator_id = 0;

                                                                        /* Waste categories */	
                                                                        $sqlin = "SELECT rs.id rsid,
                                                                                        wc.category wccat,
                                                                                        rs.image_path rsimage,
                                                                                        rs.category_id rscat
                                                                                        FROM resident_segragation rs
                                                                                        INNER JOIN user ON rs.resident_id = user.id
                                                                                        INNER JOIN waste_category wc ON rs.category_id = wc.id 
                                                                                        WHERE rs.deleted = 0 
                                                                                        AND rs.collected = 1 
                                                                                        AND rs.resident_id = '$resident_id'";
                                                                        
                                                                        $sqlcat = $sqlin." GROUP BY wccat";
                                                                        $resultcat = mysqli_query($mysqli,$sqlcat); 
                                                                        if (mysqli_num_rows($resultcat) > 0) {  
                                                                            
                                                                            while($rowcat = mysqli_fetch_assoc($resultcat)) {   
                                                                            //display category and its corresponding images
                                                                            echo '<div class="header-area">';
                                                                            echo 'Waste Category: <span class="color-blue">'.$rowcat['wccat'].'</span>';
                                                                            echo '</div>';
                                                                            echo '<div class="content-area">';

                                                                            $catid = $rowcat['rscat'];
                                                                            $sqlimg = "SELECT rs.id rsid,
                                                                                        wc.category wccat,
                                                                                        rs.image_path rsimage,
                                                                                        rs.category_id rscat
                                                                                        FROM resident_segragation rs
                                                                                        INNER JOIN user ON rs.resident_id = user.id
                                                                                        INNER JOIN waste_category wc ON rs.category_id = wc.id 
                                                                                        WHERE rs.deleted = 0 
                                                                                        AND rs.collected = 1 
                                                                                        AND rs.resident_id = '$resident_id' 
                                                                                        AND rs.category_id = '$catid'";               
                                                                                                                    
                                                                            $resultin = mysqli_query($mysqli,$sqlimg);
                                                                            if (mysqli_num_rows($resultin) > 0) {         
                                                                                                                                                                
                                                                                while($rowin = mysqli_fetch_assoc($resultin)) {    
                                                                                    $r_segregation_id = $rowin['rsid'];
                                                                                ?>
                                                                                <a href="../images/upload/<?php echo $rowin['rsimage']; ?>" data-lightbox="<?php echo $rowcat['wccat']; ?>">
                                                                                <img src="../images/upload/<?php echo $rowin['rsimage']; ?>" style="height: 153px;padding: 1em;" >                  
                                                                                </a>                                                                                    
                                                                                <?php                                                   
                                                                                }
                                                                            }
                                                                            echo '</div>';                                      
                                                                            ?>
                                                                            <form method="POST" action="../api/waste-classification.php">
                                                                            <!-- hidden value -->
                                                                            <input type="hidden" name="r_segregation_id" value="<?php echo $r_segregation_id; ?>">
                                                                            <?php $resident_exist = isResidentSegregationIdExist($mysqli,$r_segregation_id); ?>

                                                                            <?php if($resident_exist == 0){ ?>
                                                                           <!--if not yet saved -->
                                                                            <div class="remarks-content">
                                                                                <label class="color-black">Classify detail:</label><br>
                                                                                <span class="small color-red">Note: For inventory and selling waste put a certain weight of each ff:</span>
                                                                                <div class="row inner4">
                                                                                   <div class="col-md-12">
                                                                                       <?php
                                                                                       $sqlclass = "SELECT id,name FROM waste_class
                                                                                                WHERE waste_category_id = '$catid'";
                                                                                        $resultclass = mysqli_query($mysqli,$sqlclass);
                                                                                        if (mysqli_num_rows($resultclass) > 0) {  
                                                                                            echo '<div class="row bgwhite">';
                                                                                            
                                                                                            echo '<div class="col-md-4 " >';
                                                                                            echo '<table class="inner-table">';
                                                                                            $count22 = 0;
                                                                                            while($rowclass = mysqli_fetch_assoc($resultclass)) {  
                                                                                                $count22++;
                                                                                                $classid = $rowclass['id'];
                                                                                                echo '<tr><td>';
                                                                                                echo '<input type="hidden" name="cid[]" value="'.$classid.'" />';
                                                                                                echo '<label>'.$rowclass['name'].' </label>';
                                                                                                echo '</td></tr>';
                                                                                                echo '<tr>';
                                                                                                echo '<td>';
                                                                                                echo '<input type="text" class="form-control2" name="weight[]" />';
                                                                                                echo '</td>';
                                                                                                echo '<td >';
                                                                                                echo 'Unit: Kg';
                                                                                                echo '</td>';
                                                                                                echo '</tr>';
                                                                                                
                                                                                                if($count22 % 3 == 0){
                                                                                                    echo '</table>';
                                                                                                  echo '</div>';
                                                                                                  echo '<div class="col-md-4" class="inner4">';
                                                                                                    echo '<table class="inner-table">';
                                                                                                }
                                                                                            }
                                                                                              echo '</table>';
                                                                                            echo '</div>';//endcolsm4

                                                                                            echo '</div>';//endrow
                                                                                        }else{
                                                                                            echo 'No class added.';
                                                                                        }
                                                                                       ?>
                                                                                   </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="text-right form-group">
                                                                                             <input type="submit" name="save" class="btn btn-primary" value="Save">
                                                                                        </div>    
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div><!-- remarks content -->
                                                                            <!--if not yet saved -->
                                                                            <?php }else{ ?>

                                                                            <!--if already saved -->
                                                                            <div class="remarks-content">
                                                                                <label class="color-black">Classify detail: Saved </label><br>
                                                                                <span class="small color-red">Note: For inventory and selling waste put a certain weight of each ff:</span>
                                                                                <div class="row inner4">
                                                                                   <div class="col-md-12">
                                                                                       <?php
                                                                                       $sqlclass = "SELECT cw.id cwid,
                                                                                                    name,
                                                                                                    weight,
                                                                                                    unit,
                                                                                                    facilitator_id,
                                                                                                    cw.waste_class_id cwwcid
                                                                                                    FROM classified_waste cw
                                                                                                    INNER JOIN waste_class wc
                                                                                                    ON cw.waste_class_id = wc.id
                                                                                                    WHERE resident_segregation_id = '$r_segregation_id'";
                                                                                        
                                                                                        $resultclass = mysqli_query($mysqli,$sqlclass);
                                                                                        if (mysqli_num_rows($resultclass) > 0) {  
                                                                                            echo '<div class="row bgwhite">';
                                                                                            
                                                                                            echo '<div class="col-md-4 " >';
                                                                                            echo '<table class="inner-table">';
                                                                                            $count22 = 0;
                                                                                            while($rowclass = mysqli_fetch_assoc($resultclass)) {  
                                                                                                $count22++;
                                                                                                $classid = $rowclass['cwwcid'];
                                                                                                $g_facilitator_id = $rowclass['facilitator_id'];
                                                                                                $classified_w_id = $rowclass['cwid'];
                                                                                                echo '<input type="hidden" value="'.$classified_w_id.'" name="cwid[]" />';
                                                                                                echo '<tr><td>';
                                                                                                echo '<input type="hidden" name="cid[]" value="'.$classid.'" />';
                                                                                                echo '<label>'.$rowclass['name'].' </label>';
                                                                                                echo '</td></tr>';
                                                                                                echo '<tr>';
                                                                                                echo '<td>';
                                                                                                echo '<input type="text" class="form-control2" name="weight[]" value="'.$rowclass['weight'].'" />';
                                                                                                echo '</td>';
                                                                                                echo '<td >';
                                                                                                echo 'Unit: '.$rowclass['unit'];
                                                                                                echo '</td>';
                                                                                                echo '</tr>';
                                                                                                
                                                                                                if($count22 % 3 == 0){
                                                                                                    echo '</table>';
                                                                                                  echo '</div>';
                                                                                                  echo '<div class="col-md-4" class="inner4">';
                                                                                                    echo '<table class="inner-table">';
                                                                                                }
                                                                                            }
                                                                                              echo '</table>';
                                                                                            echo '</div>';//endcolsm4

                                                                                            echo '</div>';//endrow
                                                                                        }else{
                                                                                            echo 'No class added.';
                                                                                        }
                                                                                       ?>
                                                                                   </div>
                                                                                    <div class="col-md-12">
                                                                                       
                                                                                        <div class="text-right form-group">
                                                                                             <input type="submit" name="edit" class="btn btn-primary" value="Save" <?php if($g_facilitator_id != $_SESSION['login_id']){ echo 'disabled'; } ?> >
                                                                                        </div> 

                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div><!-- remarks content -->
                                                                            <!--if already saved -->
                                                                            <?php } ?>
                                                                            </form>
                                                                            <?php
                                                                            echo '<hr/>';
                                                                            }

                                                                        }
                                                                                                                                    
                                                                        ?>
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                </div><!-- end accordion -->
                                                                <?php
                                                                	}
                                            					}
                                                                ?>
                                                            </div><!-- col sm 10-->

                                                        </div>  
                                       
                                                    </td>                                               
                                                </tr>
                                                <tr class="spacer"></tr>
                                            <?php 
                                            }
                                        }else{
                                            echo "<tr><td>No Result Found.</td></tr>";
                                            echo '<tr class="spacer"></tr>';
                                        }
                                    ?>                                    
                                       
                                      
                                       
                                </table>
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
<script src="../dist/js/lightbox-plus-jquery.min.js"></script>
<script type="text/javascript" src="../js/dropzone.js"></script>
<?php  include '../template/footer.php'; ?>

<script type="text/javascript">
    $('.panel-collapse').on('show.bs.collapse', function () {
        $(this).siblings('.panel-heading').addClass('active');
      });

      $('.panel-collapse').on('hide.bs.collapse', function () {
        $(this).siblings('.panel-heading').removeClass('active');
    });
    $(".select-violation").select2();
</script>