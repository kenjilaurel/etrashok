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
    <?php 
 $items = array();


   $sql1 = "SELECT `id`, `category`  FROM `waste_category` WHERE 1";
                                                                $result1 = mysqli_query($mysql2,$sql1);
                                                                if (mysqli_num_rows($result1) > 0) {         
                                                                                          
                                                                    while($row = mysqli_fetch_assoc($result1)) {
                                                                        array_push($items, ['id' => $row['id'], 'cat' => $row['category']]);                              
                                                                    
                                                                    }
                                                                }                                                 

                                         
?>
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
                                    <li class="list-inline-item">Sell Classified Waste</li>
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
      
            <table id="myTable" class=" table order-list">
                <thead>
                    <tr>
                        <td>Type</td>
                        <td>Quantity</td>
                        <td>Price</td>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                              <select class="form-control" id="itemType" name = "itemType">
                                                
                                <?php                                           
                                foreach($items as $item){
                               
                                 echo '<option value="'.$item["id"].'">'.$item["cat"].'</option>';
                              
                                }
                                ?>   
                                                 
                                                             
                                </select>
                           
                        </td>
                        <td >
                            <input type="number" name="itemQuantity"  class="form-control"/>
                        </td>
                        <td>
                            <?php 
                            $fPrice = reset($items);
                            echo $fPrice["cat"];
                            ?>
                            <input type="number" name="itemprice"  class="form-control"/>
                        </td>
                        <td><a class="deleteRow"></a>

                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
                        </td>
                        <td>
                            <input type="button" class="btn btn-lg btn-block " id="sell" value="Sell" />
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </tfoot>
            </table>

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
    $(document).ready(function () {
    var counter = 0;

            $("#addrow").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";

                        cols += '<td><select class="form-control" id="itemType" name = "itemType"><?php foreach($items as $item){ echo '<option value="'.$item["id"].'">'.$item["cat"].'</option>';}?> </select></td>';
                        cols += '<td><input type="number" class="form-control" name="itemQuantity' + counter + '"/></td>';
                        cols += '<td><input type="number" class="form-control" name="itemprice' + counter + '"/></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                counter++;
            });

            $("#sell").on("click", function () {
                 $("table.order-list tbody tr").find('td').each(function () {
                   $(this).find('input[name^="itemType"]').each(function () {
                        console.log($(this).val());
                   });
                 });
            });

            $("table.order-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();       
                counter -= 1
            });


        });



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
</script>