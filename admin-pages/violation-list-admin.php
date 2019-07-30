<?php  include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<title>Report - Violation</title>
<style type="text/css">
    .changeFont {
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol" !important; 
    }

</style>
<body class="animsition">
    <div class="page-wrapper">
        
        <?php include '../template/navigation-admin.php'; ?>
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
                                        <li class="list-inline-item">Report</li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Violation</li>
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
                      <div class="card">                        
                          <div class="card-body">     
                           <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">List of Violator's</h3>
                                    <div class="table-responsive">
                                        <div class="table-data__tool changeFont">
                                            <div class="table-data__tool-left inline height45px">
                                               
                                                <div class="form-group inline" style="margin-bottom: 0">   
                                                    <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                        <input class="form-control"  type="text" name="filter_from" placeholder="Filter from" id="ffrom">                               
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    </div>                                                  
                                                    <input type="hidden" id="dtp_input2" value="" />                               
                                                </div>
                                                
                                                 <div class="form-group inline" style="margin-bottom: 0">                                                       
                                                    <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">

                                                        <input id="fto" class="form-control"  type="text" name="filter_to" placeholder="Filter to">                             
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    </div>                                                  
                                                    <input type="hidden" id="dtp_input1" value="" />                              
                                                </div>
                                                
                                                
                                                    <button id="filter" class="au-btn-filter btn-filter" style="margin-right: 0.5em;">
                                                    <i class="zmdi zmdi-filter-list"></i>filters</button>   

                                                    <button id="clearfilter" class="au-btn-filter btn-cancel">
                                                    <i class="fa fa-ban"></i>Clear filters</button>
                                                
                                                
                                            </div>
                                            <div class="table-data__tool-right">
                                                <button id="print" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    <i class="fa fa-print"></i>PRINT REPORT</button>
                                            <!--     <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                                    <select class="js-select2" name="type">
                                                        <option selected="selected">Export</option>
                                                        <option value="">Option 1</option>
                                                        <option value="">Option 2</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <table class="table table-top-campaign sitio-table">
                                            <thead>
                                                <th></th>
                                                <th>Date collected</th>
                                                <th>Resident</th>                                               
                                                <th>Waste category</th>
                                                <th>Violation</th>
                                                <th>Penalty</th>
                                                <th>Collector</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $pfrom = 0;
                                                $pto = 0;
                                                $sql = "SELECT rs.id rsid,sr.id srid,
                                                                firstname,
                                                                middlename,
                                                                lastname,
                                                                wc.category wccat,
                                                                date_collected,
                                                                v.description,
                                                                penalty,
                                                                collector_id
                                                            FROM resident_segragation rs 
                                                            INNER JOIN segregation_remarks sr
                                                            ON rs.segregation_remarks_id = sr.id
                                                            INNER JOIN user 
                                                            ON user.id = rs.resident_id
                                                            INNER JOIN waste_category wc
                                                            ON wc.id = rs.category_id
                                                            INNER JOIN violation v
                                                            ON sr.violation_id = v.id
                                                            WHERE rs.deleted = 0 AND collected = 1
                                                            AND sr.violation_id != 0";
                                                           
                                                if(isset($_GET['from'])){
                                                    $pfrom  = $_GET['from'];
                                                    $pto    = $_GET['to'];
                                                    $sql .= " AND date_collected BETWEEN '$pfrom' AND '$pto'";
                                                    
                                                }   
                                                echo '<input type="hidden" id="pfrom" value="'.$pfrom.'" />';
                                                echo '<input type="hidden" id="pto" value="'.$pto.'" />';       
                                                $sql .= " GROUP BY lastname,wccat";
            //                                     echo $sql;           
                                                $result = mysqli_query($mysql2,$sql);
                                                if (mysqli_num_rows($result) > 0) {         
                                                    $count = 0;                           
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        $penalty = number_format((float)$row['penalty'], 2, '.', '');
                                                        $resident = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
                                                        $date_collected = $row['date_collected'];
                                                        $w_cat = $row['wccat'];
                                                        $collector = getUserName($mysqli,$row['collector_id']);
                                                        $count++;
                                                        echo '<tr >';               
                                                        echo '<td>'.$count.'</td>';
                                                        echo '<td>'.$date_collected.'</td>';
                                                        echo '<td>'.$resident.'</td>';
                                                        echo '<td>'.$w_cat.'</td>';             
                                                        echo '<td>'.$row['description'].'</td>';
                                                        echo '<td>&#8369; '.$penalty.'</td>';
                                                        echo '<td>'.$collector.'</td>';
                                                        echo ' <td>
     <button class="btn btn-danger btn-xs deleteViolation" violationID="'.$row["srid"].'">
        <i class="fas fa-trash-alt"></i>Delete
      </button
    </td>';
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
    <script type="text/javascript">
          jQuery(document).ready(function($) {
             $(".deleteViolation").click(function(){
                var violationID = $(this).attr("violationID")
                  $.ajax({
                      url: "../api/violationAction.php",
                      data: {
                          'violationID' : violationID
                      },
                      dataType: 'json',
                      success: function(data) {
                        console.log(data)
                         location.reload(true);

                      },
                      error: function(data){
                          //error
                      }
                  });


            });
        });
        $("#print").click(function(){
            try {
                var from = $("#pfrom").val();
                var to = $("#pto").val();
                if((from != "0" && to != "0")){
                    window.open('../snippet/print-violators.php?from='+from+'&to='+to);
                }else{
                    window.open('../snippet/print-violators.php');  
                }
            }catch(err) {
                window.open('../snippet/print-violators.php');  
            }
        });
        $("#filter").click(function(){
            var from = $("#ffrom").val();
            var to = $("#fto").val();
            if(from != "" && to != ""){
                window.location.replace('report-violation.php?from='+from+'&to='+to);
            }else{
                alert("Specify Date: Both date required.");
            }
        });
        $("#clearfilter").click(function(){
            window.location.replace('report-violation.php');
        });
    </script>