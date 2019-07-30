<?php include '../template/header.php'; ?>
<?php error_reporting(1); ?>



<title>Unapproved Users</title>
</head> 
<body class="animsition" id="user-page">
    <div class="page-wrapper">
       
       <!-- navigation -->
       <?php include '../template/navigation-admin.php'; ?>

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
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
                                        <li class="list-inline-item">User</li>
                                         <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Unapproved</li>
                                    </ul>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->


            <!-- Main content-->
            <div class="main-content">                
                <section class="p-t-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-5 m-b-35">All Unapprove Users</h3>
                                <?php 
                                $user_role = $_SESSION['login_role'];
                                    if($user_role != 1){
                                    echo 'not allowed to access the page';
                                    exit;
                                }
                                ?>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>    
                                    <form class="au-form-icon--sm" action="" method="post">
                                        <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports...">
                                        <button class="au-btn--submit2" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </form>                     
                                </div>

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>App No.</th>
                                                <th>Precinct No.</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Role</th>
                                                <th>Approved</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT b.name as role,a.id, a.application_no, a.precinct_no, a.firstname, a.middlename, a.lastname, a.address_city, a.address_brgy, a.address_street_house, a.profession, a.user_role, a.approved FROM user as a INNER JOIN user_role as b ON a.user_role = b.id WHERE a.user_role != 1 AND a.approved = 0 ORDER BY id desc";
                                                $result = mysqli_query($mysqli,$sql);
                                                if (mysqli_num_rows($result) > 0) {        
                                                    while($row = mysqli_fetch_assoc($result)) {

                                                        $id = $row['id'];
                                                        $name = $row['lastname'].', '.$row['firstname'].' '.$row['middlename'];
                                                        $address = $row['address_street_house'].' '.$row['address_brgy'].' '.$row['address_city'];
                                                        $approved = $row['approved'];
                                                        if($approved == 0){
                                                            $approved = '<span class="status--denied">Not Approve</span>';
                                                        }else{
                                                            $approved = '<span class="status--process">Aprroved</span>';
                                                        }
                                                        /*user role*/
                                                        $myrole = getUserRole($row['user_role']);

                                                        echo '<tr class="tr-shadow">';
                                                        echo '<td>'.$row['application_no'].'</td>';
                                                        echo '<td>'.$row['precinct_no'].'</td>';
                                                        echo '<td>'.$name.'</td>';
                                                        echo '<td>'.$address.'</td>';

                                                        echo '<td>';
                                                            echo '<span id="role-label'.$id.'">'.$row['role'].'</span>';
                                                            echo ' <select style="display:none;" id="select-role'.$id.'" class="form-control select-role">';
                                                            echo '<option value="-1">Role Not Set</option>';

                                                            $sql1 = "SELECT id,
                                                                name,
                                                                description
                                                                FROM user_role WHERE name <> 'Admin'";
                                                                $result1 = mysqli_query($mysql2,$sql1);
                                                                if (mysqli_num_rows($result1) > 0) {         
                                                                                          
                                                                    while($row = mysqli_fetch_assoc($result1)) {                                                        
                                                                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                                                    }
                                                                }
                                                            echo '</select>';
                                                        echo '</td>';

                                                        echo '<td>';
                                                            echo '<div id="status-label'.$id.'">'.$approved.'</div>';
                                                            echo ' <select style="display:none;" id="select-status'.$id.'" class="form-control select-status">';
                                                            echo '<option value="0">Not Approve</option>';
                                                            echo '<option value="1">Approved</option>';
                                                            echo '</select>';
                                                        echo '</td>';

                                                        echo '<td>';
                                                            echo '<div class="table-data-feature">';
                                                        
                                                            echo '<button id="edit-btn'.$id.'" class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="javascript:editUserRow('.$id.');">';
                                                            echo '<i class="zmdi zmdi-edit"></i>';
                                                            echo '</button>';

                                                            echo '<button style="display:none;" id="save-btn'.$id.'" class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="javascript:saveUserRow('.$id.');">';
                                                            echo '<i class="fa fa-save"></i>';
                                                            echo '</button>';
                                                            
                                                            echo '</div>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                                        echo '<tr class="spacer"></tr>';
                                                    }
                                                }
                                            ?>
                                                                                 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>  
              <!-- modal Student -->
            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelUser" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #fff3cd;">
                            <h4 class="modal-title" id="myModalLabelUser">User Approval Detail </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            
                        </div>
                        <form action="../api/user-api.php" method="post" >

                            <div class="modal-body user-modal-body">
                                 
                            </div><!--modal body -->
                            <div class="modal-footer">                                  

                                 <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                                                                 
                                 <input type="submit"   name="submitUpdate" class="btn btn-primary" value="Save">            
                            </div>
                       </form>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
          <!-- modal -->

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
        </div>

    </div>

  <?php include '../template/footer.php' ?>
  <script type="text/javascript">

     function showUserModal(id){

        var id = id;                 
        $('.user-modal-body').load('../ajax/user-modal.php?id=' + id,function(){             
            $('#userModal').modal({show:true});            
        });
                
    }
    function editUserRow(id){
        $('#edit-btn'+id).hide();
        $('#save-btn'+id).show();

        $('#status-label'+id).hide();
        $('#select-status'+id).show();
        $('#role-label'+id).hide();
        $('#select-role'+id).show();
    }
    function saveUserRow(id){
        $('#edit-btn'+id).show();
        $('#save-btn'+id).hide();

        var id = id;
        var role = $('#select-role'+id).val();
        var status = $('#select-status'+id).val();
        var role_text = $('#select-role'+id).children("option:selected").text();
        var status_text = $('#select-status'+id).children("option:selected").text();

     

        $.ajax({          
          url: '../ajax/user-table-dropdown.php',
          data: {
           id:id,       
           role:role,
           status:status,
          },
          dataType: 'json',
            success: function(data) {
                if(data == true) {
                    $('#status-label'+id).text(status_text);
                    $('#role-label'+id).text(role_text);
                    if(status_text == 'Approved'){
                        $('#status-label'+id).css("color","#00ad5f");
                    }else{
                        $('#status-label'+id).css("color","#fa4251");
                    }
                    
                }else{
                    $('#status-label'+id).text('Not Save');
                    $('#role-label'+id).text('Not Save');
                    
                }                   
            },
            error: function(data){
                //error
            }
        });

        $('#status-label'+id).show();
        $('#select-status'+id).hide();
        $('#role-label'+id).show();
        $('#select-role'+id).hide();
    }
  </script>