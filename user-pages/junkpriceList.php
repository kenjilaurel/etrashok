<?php include '../template/header.php' ?>
<title>Price List</title>
<body class="animsition">
    <div class="page-wrapper">
       <?php include '../template/navigation-user.php'; ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="alert alert-dark" role="alert">
                                  Junk Shop Price List
                                </div>
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
                                    </div>                                </div>
                                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
                                                        zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
                                                        resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
                                                        genus Equus, along with other living equids.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                
                                                <th>category</th>
                                                <th>description</th>
                                                <th>date</th>
                                                <th>price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php 
                                                $sql = "SELECT b.category as cat,a.description,a.created,a.price FROM junkTable as a INNER JOIN waste_category as b ON a.category = b.id";
                                                $result = mysqli_query($mysqli,$sql);
                                                if (mysqli_num_rows($result) > 0) {                                  
                                                    while($row = mysqli_fetch_assoc($result)) {                                                        
                                                        echo '<tr class="tr-shadow">';
                                                        
                                                        echo '<td>'.$row['cat'].'</td>';
                                                        echo '<td class="desc">'.$row['description'].'</td>';
                                                        echo '<td>'.$row['created'].'</td>';
                                                        echo '<td>'.$row['price'].'</td>';
                                                        echo '<td>';
                                                        echo '<div class="table-data-feature">';
                                                       
                                                        
                                                        echo '</div>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                                        echo '<tr class="spacer"></tr>';
                                                    }
                                                }else{
                                                    echo "<tr><td>No Result Found.</td></tr>";
                                                }
                                            ?>
                                       
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Etrashok. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <?php include '../template/footer.php' ?>