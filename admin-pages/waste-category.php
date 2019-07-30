<?php include '../template/header.php' ?>
<title>Waste Categories</title>
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
                                        <li class="list-inline-item">Waste Category</li>
                                       
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
                                    <div class="card-header">Waste Detail</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Fill up the Fields</h3>
                                        </div>
                                        <hr>
                                        <form action="../api/admin-waste-category.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group" style="margin-top: 0.5em;background: #f1f1f1;padding: 1em 0;">
                                                <div class="col col-md-12">
                                                    <label for="file-input" class=" form-control-label" style="font-size:13.7px;">Upload waste category image 
                                                    <span style="font-size: 13px;">size: 355 x 222</span></label>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <input type="file" id="file-input" name="image" class="form-control-file" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="select-leader" class=" form-control-label ">Category</label>
                                                <input type="text" name="category" placeholder="Write Waste Category here..." id="waste-category" class="form-control">
                                            </div>                                            
                                            <div class="form-group">
                                                <label for="cc-sitio" class="control-label mb-1">Description</label>
                                                <textarea class="form-control" name="description" placeholder="Write the description of the category here"></textarea>
                                            </div>                                       
                                            
                                            <div>
                                                <button  name="save_category" type="submit" class="btn btn-lg btn-info btn-block">
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
                                    <h3 class="title-3 m-b-30">List of Waste Category</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign sitio-table">
                                            <tbody>
                                                <?php 
                                                $sql = "SELECT id,
                                                                category,
                                                                description,
                                                                image_path
                                                                FROM waste_category WHERE deleted = 0";
                                                $result = mysqli_query($mysqli,$sql);
                                                if (mysqli_num_rows($result) > 0) {         
                                                    $count = 0;                           
                                                    while($row = mysqli_fetch_assoc($result)) {                                                        
                                                        $count++;
                                                        echo '<tr onclick="javascript:showWasteModal(this);">';
                                                        echo '<td class="hide-td">'.$row['image_path'].'</td>'; 
                                                        echo '<td>'.$count.'</td>';
                                                        echo '<td class="hide-td">'.$row['id'].'</td>';             
                                                        echo '<td>'.$row['category'].'</td>';
                                                        echo '<td style="width:117px;text-align:center;">'.'<img style="height: 70px;" class="img-fluid" src="../images/'.$row['image_path'].'"'.'</td>';
                                                        echo '<td>'.$row['description'].'</td>';

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
                        <h4 class="modal-title" id="myModalLabelSitio">EDIT/DELETE CATEGORY</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        
                    </div>
                    <div class="modal-body">
                                           
                    <form action="../api/admin-waste-category.php" method="post" enctype="multipart/form-data">
                        <!-- hidden value -->
                        <input type="hidden" name="category_id" id="category_id">
                        <div class="form-group text-center">
                            <img id="modal-img-category" src="" class="img-fluid" style="height: 140px;">
                        </div>
                        <div class="form-group" style="margin-top: 0.5em;background: #f1f1f1;padding: 1em 0;">
                            <div class="col col-md-12">
                                <label for="file-input" class=" form-control-label" style="font-size:13.7px;">Upload waste category image 
                                <span style="font-size: 13px;">size: 355 x 222</span></label>
                            </div>
                            <div class="col-12 col-md-12">
                                <input type="file" id="file-input" name="image" class="form-control-file" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select-leader" class=" form-control-label ">Category</label>
                            <input type="text" name="category" placeholder="Write Waste Category here..." id="waste-cat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cc-sitio" class="control-label mb-1">Description</label>
                            <textarea id="waste-desc" class="form-control" name="description" placeholder="Write the description of the category here"></textarea>
                        </div>
                        
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button  type="submit" name="delete_category" class="btn btn-lg btn-danger btn-block">
                                        <i class="fa fa-ban"></i>&nbsp;
                                       DELETE
                                    </button>
                                </div>
                                <div class="col-lg-6">
                                    <button  type="submit" name="edit_category" class="btn btn-lg btn-info btn-block">
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
         function showWasteModal(row){
            var x=row.cells;
            var id = x[2].innerHTML;
            var cat = x[3].innerHTML;
            var wimg = x[0].innerHTML;
            var desc = x[5].innerHTML;
            
            // console.log(result[1]);
            $("#category_id").val(id);
            $("#waste-cat").val(cat);
            $("#waste-desc").val(desc);
            $("#modal-img-category").attr('src','../images/'+ wimg);
            
            $('#wasteModal').modal({show:true}); 
          }
    </script>