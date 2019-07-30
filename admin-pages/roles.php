<?php include '../template/header.php' ?>
<title>User Roles</title>
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
                                        <li class="list-inline-item">User Roles</li>
                                       
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
                                    <div class="card-header">Role Details</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Fill up the Fields</h3>
                                        </div>
                                        <hr>
                                        <form action="../api/process-role.php" method="post" enctype="multipart/form-data">
                                         
                                            <div class="form-group">
                                                <label for="select-leader" class=" form-control-label ">Role Name</label>
                                                <input type="text" name="roleName" placeholder="Write Role Name here..." id="roleName" class="form-control">
                                            </div>                                            
                                            <div class="form-group">
                                                <label for="cc-sitio" class="control-label mb-1">Description</label>
                                                <textarea class="form-control" name="roleDescription" placeholder="Write the description of the Role here"></textarea>
                                            </div>                                       
                                            
                                            <div>
                                                <button  name="save_role" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-save"></i>&nbsp;
                                                   SAVE
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- col 6 -->
                              <div class="col-lg-3">
                                <!-- SITIO-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">Roles</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign sitio-table">
                                            <tbody>
                                                <?php 
                                                $sql = "SELECT id,
                                                                name,
                                                                description
                                                                FROM user_role WHERE name <> 'Admin'";
                                                $result = mysqli_query($mysqli,$sql);
                                                if (mysqli_num_rows($result) > 0) {         
                                                    $count = 0;                           
                                                    while($row = mysqli_fetch_assoc($result)) {                                                        
                                                        $count++;
                                                        echo '<tr>'; 
                                                        echo '<td>'.$row['id'].'</td>';             
                                                        echo '<td>'.$row['name'].'</td>';
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