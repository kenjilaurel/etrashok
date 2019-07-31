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
    #myTable td, #myTable th {
        border-top: 0px !important;
    }
</style>
<body class="animsition" id="collection-page">
<div class="page-wrapper">
    <?php include '../template/navigation-user.php'; ?>
    <?php 
 $items = array();


   $sql1 = "SELECT a.id,a.waste_category_id as category,b.description as name,b.price FROM waste_class as a INNER JOIN junktable as b
ON a.id = b.subCategoryID";
                                                                $result1 = mysqli_query($mysql2,$sql1);
                                                                if (mysqli_num_rows($result1) > 0) {         
                                                                                          
                                                                    while($row = mysqli_fetch_assoc($result1)) {
                                                                        array_push($items, ['id' => $row['id'], 'cat' => $row['category'],'cat' => $row['category'],'name' => $row['name'],'price' => $row['price']]);                              
                                                                    
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
                        <div id="alertContainer"></div>                         
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
                               
                                 echo '<option value="'.$item["id"].'" price="'.$item["price"].'">'.$item["name"].'</option>';
                              
                                }
                                ?>   
                                                 
                                                             
                                </select>
                           
                        </td>
                        <td >
                             <?php 
                            $fPrice = reset($items);
                            
                            ?>
                            <input type="number" sumTotalQuantity = "1" name="itemQuantity" id="itemQuantity" class="form-control"  min="1" max="1000" defaultVal=<?php echo $fPrice["price"]; ?> value=1 />
                        </td>
                        <td>
                            
                            <input type="number" sumTotal = "1" name="itemprice"  class="form-control" value=<?php echo $fPrice["price"]; ?> disabled/>
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
                         <td class="pull-right">
                            <input type="button" class="btn btn-lg btn-block " id="totalValue" value="Total : <?php echo $fPrice["price"]; ?>" style="width: 300px;" disabled/>
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
                var sumAll = 0;
                var cols = "";

                        cols += '<td><select class="form-control" id="itemType' + counter + '" name = "itemType"><?php foreach($items as $item){ echo '<option value="'.$item["id"].'" price="'.$item["price"].'">'.$item["name"].'</option>';}?> </select></td>';
                        cols += '<td><input type="number" class="form-control" sumTotalQuantity = "1" id="itemQuantity' + counter + '" name="itemQuantity' + counter + '" defaultVal=<?php echo $fPrice["price"]; ?>  min="1" max="1000" value=1></td>';
                        cols += '<td><input type="number" class="form-control" sumTotal = "1" name="itemprice' + counter + '"/  value=<?php echo $fPrice["price"]; ?> disabled></td>';

                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
               
                var str1 = "#itemType";
                var res = str1.concat(counter);
                $(res).change(function(){
                    var sumAllInner = 0;
                    var selected = " option:selected"
                    var resel = res.concat(selected);
                   $(resel).each(function() {
                        var i = $(this).closest('tr').find('td:eq(2)').find('input');
                        var quan = $(this).closest('tr').find('td:eq(1)').find('input').val();
                        var defaultPrice = $(this).closest('tr').find('td:eq(1)').find('input');
                        defaultPrice.attr("defaultVal",$(this).attr('price'))

                        total = $(this).attr('price') * quan;
                        if (total == 0) {
                            i.val($(this).attr('price'));  
                        }
                        else {
                            i.val(parseFloat(total).toFixed(2));
                        }
                    });
                   $("table.order-list tbody tr").find('td').each(function () {
                   $(this).find('input[name^="itemprice"]').each(function () {
                          sumAllInner += Number($(this).val());
                          $("table.order-list tfoot #totalValue").val("Total : " + parseFloat(sumAllInner).toFixed(2));
                       });
                     });
                });
                var quantityId = "#itemQuantity";
                var quantityIdRes = quantityId.concat(counter);
                $(quantityIdRes).change(function(){
                    var sumAllInner = 0;
                    var price = $(this).attr("defaultVal")
                    var total = price * $(this).val();
                    var input = $(this).closest('tr').find('td:eq(2)').find('input');
                    input.val(parseFloat(total).toFixed(2));

                    $("table.order-list tbody tr").find('td').each(function () {
                   $(this).find('input[name^="itemprice"]').each(function () {
                          sumAllInner += Number($(this).val());
                          $("table.order-list tfoot #totalValue").val("Total : " + parseFloat(sumAllInner).toFixed(2));
                       });
                     });

                });

                $("table.order-list tbody tr").find('td').each(function () {
                   $(this).find('input[name^="itemprice"]').each(function () {
                      sumAll += Number($(this).val());
                      $("table.order-list tfoot #totalValue").val(parseFloat(sumAll).toFixed(2));
                   });
                 });

                 counter++;

            });

            $("#sell").on("click", function () {
                var rowCount =  $('#myTable >tbody >tr').length;
                var count = 0
                 $("table.order-list tbody").find('tr').each(function () {
                   console.log($(this).find('select[name^="itemType"]').val() + " " + $(this).find('input[sumTotalQuantity^="1"]').val() + " " + $(this).find('input[sumTotal^="1"]').val());

                var subCategory = $(this).find('select[name^="itemType"]').val()
                var quantity = $(this).find('input[sumTotalQuantity^="1"]').val()
                var price = $(this).find('input[sumTotal^="1"]').val()

                   $.ajax({
                          url: "../api/processItemSell.php",
                          data: {
                              'subCategory' : subCategory,
                              'quantity' : quantity,
                              'price' : price
                          },
                          dataType: 'json',
                          success: function(data) {
                            if (data["status"] == true) {
                                  count++;
                                  if (rowCount == count) {
                                    $( "#alertContainer" ).append( "<div class='alert alert-success alert-dismissible fade show' role='alert'> <strong>"+data["msg"]+"!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>" );
                                  }
                                }
                                else {
                                  
                                }

                          },
                          error: function(data){
                              //error
                          }
                      });

                     });
            });

            $("table.order-list").on("click", ".ibtnDel", function (event) {
                var sumAllInner = 0;
                $(this).closest("tr").remove();       
                counter -= 1
                 $("table.order-list tbody tr").find('td').each(function () {
                   $(this).find('input[name^="itemprice"]').each(function () {
                          sumAllInner += Number($(this).val());
                          $("table.order-list tfoot #totalValue").val("Total : " + parseFloat(sumAllInner).toFixed(2));
                       });
                     });
            });

             $("#itemType").change(function(){
                 var sumAll = 0;
                $( "#itemType option:selected" ).each(function() {
                    var i = $(this).closest('tr').find('td:eq(2)').find('input');
                    var quan = $(this).closest('tr').find('td:eq(1)').find('input').val();
                    var defaultPrice = $(this).closest('tr').find('td:eq(1)').find('input');
                    defaultPrice.attr("defaultVal",$(this).attr('price'))

                    total = $(this).attr('price') * quan;
                    if (total == 0) {
                        i.val($(this).attr('price'));  
                    }
                    else {
                        i.val(parseFloat(total).toFixed(2));
                    }
                });
                 $("table.order-list tbody tr").find('td').each(function () {
                   $(this).find('input[name^="itemprice"]').each(function () {
                      sumAll += Number($(this).val());
                      $("table.order-list tfoot #totalValue").val("Total : " + parseFloat(sumAll).toFixed(2));
                   });
                 });
                  
            });

            $("#itemQuantity").change(function(){
                var sumAll = 0;
                var price = $(this).attr("defaultVal")
                var total = price * $(this).val();
                var input = $(this).closest('tr').find('td:eq(2)').find('input');
                input.val(parseFloat(total).toFixed(2));


                $("table.order-list tbody tr").find('td').each(function () {
                   $(this).find('input[name^="itemprice"]').each(function () {
                      sumAll += Number($(this).val());
                      $("table.order-list tfoot #totalValue").val("Total : " + parseFloat(sumAll).toFixed(2));
                   });
                 });
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