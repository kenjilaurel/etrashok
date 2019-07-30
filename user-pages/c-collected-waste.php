<?php  include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<link rel="stylesheet" type="text/css" href="../css/dropzone.css">
<link rel="stylesheet" href="../dist/css/lightbox.min.css">
<title>Collected Waste</title>
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
                                            <a href="#">Waste Collection</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Collected waste</li>
                                    </ul>
                                </div>
                              
                            </div>
                            <div class="sub-header-breadcrumb text-right">
                                <?php 
                                $sitio_id   = $_SESSION['user_sitio'];
                                $user_sitio = getSitioName($mysqli,$sitio_id);
                                ?>
                                <p>Sitio: <?php echo $user_sitio; ?></p>
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
                                                    WHERE rs.deleted = 0 AND user.sitio = '$sitio_id'
                                                    AND rs.collected = 1  
                                                    GROUP BY lastname ORDER BY firstname ASC";
                                            $result = mysqli_query($mysqli,$sql);
                                            if (mysqli_num_rows($result) > 0) {         
                                                $count = 0;                           
                                                while($row = mysqli_fetch_assoc($result)) {                                         
                                                    $count++;
                                                    $name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
                                                    $resident_id = $row['uid'];
                                                    //addtnl
                                                    $srcollectionId = $row['srcollectionId'];
                                                    $srremarks      = $row['srremarks'];
                                                    $srviolation    = $row['srviolation'];
                                                    $srdate         = $row['srdate'];
                                                    $srid           = $row['srid'];
                                                ?>
                                                     <tr class="tr-shadow">                                               
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <?php 
                                                                    echo '<span class="rname color-black">'.$count.'. '.$name.'</span>'; 
                                                                    echo '<br>';
                                                                    echo '<span style="padding-left:1em;">Date collected: </span>';
                                                                    echo '<br>';
                                                                    echo '<span style="padding-left:1em;">'.$srdate.'</span>';
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-10">
                                                                     <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                      <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                                          <h4 class="panel-title">
                                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $count; ?>" aria-expanded="true" aria-controls="collapse<?php echo $count; ?>" title="Click to display">
                                                                              Check waste collected
                                                                            </a>
                                                                          </h4>
                                                                        </div>
                                                                        <div id="collapse<?php echo $count; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                          <div class="panel-body">
                                                                           <?php
                                                                            /* Waste categories */
                                                                            $sqlin = "SELECT rs.id rsid,
                                                                                            wc.category wccat,
                                                                                            rs.image_path rsimage,
                                                                                            rs.category_id rscat
                                                                                            FROM resident_segragation rs
                                                                                            INNER JOIN user ON rs.resident_id = user.id
                                                                                            INNER JOIN waste_category wc ON rs.category_id = wc.id 
                                                                                            WHERE rs.deleted = 0 AND user.sitio = '$sitio_id'
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
                                                                                            WHERE rs.deleted = 0 AND user.sitio = '$sitio_id'
                                                                                            AND rs.collected = 1 
                                                                                            AND rs.resident_id = '$resident_id' 
                                                                                            AND rs.category_id = '$catid'";                                                             
                                                                                $resultin = mysqli_query($mysqli,$sqlimg);
                                                                                if (mysqli_num_rows($resultin) > 0) {         
                                                                                                                                                                    
                                                                                    while($rowin = mysqli_fetch_assoc($resultin)) {    
                                                                                    ?>
                                                                                    <a href="../images/upload/<?php echo $rowin['rsimage']; ?>" data-lightbox="<?php echo $rowcat['wccat']; ?>">
                                                                                    <img src="../images/upload/<?php echo $rowin['rsimage']; ?>" style="height: 153px;padding: 1em;" >                  
                                                                                    </a>                                                                                    
                                                                                    <?php                                                   
                                                                                    }
                                                                                }
                                                                                echo '</div>';                                      
                                                                                ?>
                                                                                <form method="POST" action="../api/waste-collection.php">
                                                                                <!-- hidden value -->
                                                                                <input type="hidden" name="category_id" value="<?php echo $catid; ?>">
                                                                                <input type="hidden" name="resident_id" value="<?php echo $resident_id; ?>">
                                                                                <input type="hidden" name="remarks_id" value="<?php echo $srid; ?>">
                                                                                <div class="remarks-content">
                                                                                    <label class="color-black">Remarks:</label>
                                                                                    <div class="form-group">
                                                                                        <textarea name="remarks" class="form-control" placeholder="Write your remarks here..."><?php echo $srremarks;  ?></textarea>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group inlne">
                                                                                                <span class="small color-red">Note: Do not select if no violation</span><br>
                                                                                                <label class="color-black">
                                                                                                    Select violation
                                                                                                </label>
                                                                                                <select name="r_violation" class="form-control select-violation">
                                                                                                 <?php 
                                                                                                    $sqlv = "SELECT id,
                                                                                                                    description,
                                                                                                                    penalty 
                                                                                                                    FROM violation 
                                                                                                                    WHERE deleted = 0";    
                                                                                                        $resultv = mysqli_query($mysqli,$sqlv);
                                                                                                        if (mysqli_num_rows($resultv) > 0) {                                  echo '<option value="0">Select violation here...</option>';
                                                                                                            while($rowv = mysqli_fetch_assoc($resultv)) {
                                                                                                                $idv = $rowv['id'];
                                                                                                                $violation = $rowv['description'].' - '.number_format((float)$rowv['penalty'], 2, '.', '');
                                                                                                                if($idv == $srviolation){
                                                                                                                     echo '<option value="'.$idv.'" selected>'.$violation.'</option>';
                                                                                                                }else{
                                                                                                                    echo '<option value="'.$idv.'" >'.$violation.'</option>';
                                                                                                                }
                                                                                                                                                                                                                                  
                                                                                                            }
                                                                                                        }else{
                                                                                                            echo '<option> Violation is empty. </option>';
                                                                                                        }
                                                                                                  ?>    
                                                                                                </select>
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 text-right" style="padding-top: 1.5em;">
                                                                                            <input type="submit" name="update_collected" class="btn btn-primary" value="Update Collected">
                                                                                        </div>
                                                                                    </div>
                                                                                </div><!-- remarks content -->
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
                                                                    
                                                                </div>
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