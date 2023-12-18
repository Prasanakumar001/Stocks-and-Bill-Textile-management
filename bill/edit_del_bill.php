<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>	edit/delete bill</title>

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


 <!------------------------------------autocomplete------------------------->

 
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> 
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
                     <!-----------------------------scanner---------------------------------->

<script src="https://rawgit.com/kabachello/jQuery-Scanner-Detection/master/jquery.scannerdetection.js"></script>

</head>
<body>
	 <div class='container mt-5'>
    <table id="example123" class="display">
    <thead>
      <th>date</th>
      <th>no</th>
      <th>grandtotal</th>
      <th>edit</th>
    
    </thead>
    <tbody id='tbody'>
      <?php 
        $con=mysqli_connect("localhost","root","","penquin");
   
         $sql="select * from invoice ";
      
        $result=$con->query($sql);
        	if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
		<tr>
				<td><?php echo $row['invoiceno']; ?></td>
				<td><?php echo $row['invoicedate']; ?></td>
				<td><?php echo $row['grandtotal']; ?></td>
				<?php $sidd=$row['sid']; ?><?php $grandtotal=$row['grandtotal']; ?>
				<td>
                <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $row['sid']; ?>" href="edit.php?id=<?php echo $row['sid']; ?>">edit</a>
            
                 <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade  bd-example-modal-lg" id="exampleModal<?php echo $row['sid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class='row'>
          <div class='col-md-12'>
            <h5 class='text-success'>Product Details</h5>
            <table class='table table-bordered' id="table" >
              <thead>
               

                  <th>code</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Action</th>
                
              </thead>
              <tbody id='product_tbody'>
             
                	<form method="post">
      	<?php
      	 $sql1="select * from invoiceproducts where sid='.$sidd.' ";
      
        $result1=$con->query($sql1);
        	if (mysqli_num_rows($result1) > 0) {
				while ($row1 = mysqli_fetch_assoc($result1)) {
                  
			?>
			   <tr id="tr">
			
			  <td>
			  	<?php// echo $row1['sid']; ?>
			  	<td><input type='text' required name='wecome[]' class='form-control ' id="wecome"        value="0" ></td>
			  	<input type='text' required name='code[]' class='form-control autocomplete_txt' id="code" value="<?php echo $row1['code']; ?>" autofocus ></td>
                  <td><input type='text' required name='pname[]' class='form-control ' id="name"        value="<?php echo $row1['pname']; ?>" ></td>
                  <td><input type='text' required name='price[]' class='form-control price' id="price" value="<?php echo $row1['price']; ?>"></td>
                  <td><input type='text' required name='qty[]' class='form-control qty' id="quantity" min=0 value="<?php echo $row1['qty']; ?>"></td>
                  <td><input type='text' required name='total[]' class='form-control total' id="total" value="<?php echo $row1['total']; ?>"></td>
                  <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td>
                </tr>

		<?php }
	}else{
		echo "no data";
	} ?>
                 <script type="text/javascript">
                    var i=$('#table #tr').length;
                    console.log("hi hello .table row number::::"+i);
                     wecome="wecome"+i;
                    code="codecheck_"+i;
                    name="namecheck_"+i;
                    price="pricecheck_"+i;
                    quantity="quantitycheck_"+i;
                    totalcheck="totalcheck_"+i;
                    console.log(code);
                    console.log("enna mapla crt ta eruka "+code);
                     document.getElementById('wecome').value = wecome;
                      document.getElementById('code').id = code;
                      document.getElementById('name').id = name;
                      document.getElementById('price').id = price;
                      document.getElementById('quantity').id = quantity;
                      document.getElementById('total').id = totalcheck;
                  </script>
              </tbody>
              <tfoot>
                <tr>
                  <td><input type='button' value='+ Add Row' class='btn btn-primary btn-sm' id='btn-add-row'></td>
                  <td colspan='2' class='text-right'>Total</td>
                  <td><input type='text' name='grand_total' id='grand_total' class='form-control' id="grand_check" onload="return 0;" required></td>
                </tr>
              </tfoot>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </form>
      </div>
    </div>
  </div>
</div>
</td>
		</tr>
			<?php

				}
			}
			
			?>
    </tbody>
    </table>
  </div>
<script>
       $(document).ready(function() {
    $('#example123').DataTable( {
        order: [[ 3, 'desc' ], [ 0, 'asc' ]]
    } );
} );
     
   
 function grand_total(){
          var tot=0;
          $(".total").each(function(){
            tot+=Number($(this).val());
            console.log("hi:"+tot);
          });
          tot=parseFloat(tot).toFixed(2);
          $("#grand_total").val(tot);
          console.log(tot);
        }
     
       

      function dynamic_rows(){
         //$("input[name^='code']").focus()
       var i=$('#table #tr').length;
        var row="<tr id='tr'> <td><input type='text'  data-type='productcode'  name='code[]' data-field-name='code' class='form-control autocomplete_txt' id='codecheck_"+i+"' autofocus></td><td><input type='text'  data-type='productname'  name='pname[]' class='form-control ' id='namecheck_"+i+"'></td> <td><input type='text'  name='price[]' class='form-control price' id='pricecheck_"+i+"'></td> <td><input type='text'  name='qty[]' class='form-control qty' id='quantitycheck_"+i+"'></td> <td><input type='text'  name='total[]' class='form-control total' id='totalcheck_"+i+"'></td> <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td> </tr>";
          $("#product_tbody").append(row);
         var getname="#codecheck_"+i;
            $(getname).focus();
           console.log("dynamic_rows"+i);


            $(document).scannerDetection({

            timeBeforeScanTest: 200, // wait for the next character for upto 200ms
             avgTimeByChar: 100, // it's not a barcode if a character takes longer than 100ms
            
  onComplete: function(barcode, qty){
      $.ajax({
        url : 'http://localhost:8080/penquin/bill/bill_get_detail.php',
        type: "POST",
        data:{bar_code:barcode},
        success:function(data1){
           console.log(data1);

            var data1 = $.parseJSON(data1);
      if(data1.type == 'Success'){
        
        //Check Duplicate Value
        var barCode = document.querySelectorAll("input[name='code[]']");
        for(key=0; key < barCode.length - 1; key++)  {
          if(barCode[key].value == data1.bar_code){
            alert("Already Exist");
            return false;
          }         
        }
      
                     
                    
                 // $('#codecheck_'+element_id).val(ui.item.code),
                  $('#namecheck_'+i).val(data1.name),
                 $('#pricecheck_'+i).val(data1.sellingprice),
                 $('#quantitycheck_'+i).val("1"),
               
                  $('#totalcheck_'+i).val(data1.sellingprice);
                  grand_total();
                  dynamic_rows();
         }
        }
     });

    } // main callback function 
});

                
         $("input[name^='code']").autocomplete({
            minLength:1,autoFocus:true,

      source:function(request,response){
          console.log(request);
            $.ajax({
        url : 'http://localhost:8080/penquin/bill/json.php',
        type: "GET",
        dataType: 'json',
        success:function(data){
           //console.log(data);
          
          aData =$.map(data,function(value,key){
            return {
                 id:value.id,
                 label:value.code,
                 name:value.name,
                 sellingprice:value.sellingprice
            };
          });
          
          console.log(aData);
          
           var results=$.ui.autocomplete.filter(aData,request.term);
         
          console.log(results);
         
           response(results);
        }
     });
          },
          select:function(event,ui){
               //console.log(ui.value.name);
               id_arr = $(this).attr('id');
                     console.log("id_Arr"+id_arr);
                      id = id_arr.split("_");
                        console.log("id"+id);
                      element_id = id[id.length-1];
                        console.log("element id"+element_id);
                      //  console.log(ui.value.code);
                        //console.log(ui.value.name);
                        
                 //$(this).val(ui.item.code),$('#name_check').val(ui.item.name),
                  $('#codecheck_'+element_id).val(ui.item.code),
                  $('#namecheck_'+element_id).val(ui.item.name),
                 $('#pricecheck_'+element_id).val(ui.item.sellingprice),
                 $('#quantitycheck_'+element_id).val("1"),
               
                  $('#totalcheck_'+element_id).val(ui.item.sellingprice);
                  
                  grand_total();
                  dynamic_rows();
                //  document.getElementById('totalcheck_'+element_id+1).focus();
                 
                  ///$(function(){
                 // $('#codecheck_'+element_id+1).focus();

                   
    
         }
        });


    
        $("body").on("click",".btn-row-remove",function(){
          if(confirm("Are You Sure?")){
            $(this).closest("#tr").remove();
            grand_total();
          }
        });

        $("body").on("keyup",".price",function(){
          var price=Number($(this).val());
          var qty=Number($(this).closest("#tr").find(".qty").val());
          $(this).closest("#tr").find(".total").val(price*qty);
          grand_total();
        });
        
        $("body").on("keyup",".qty",function(){
          var qty=Number($(this).val());
          var price=Number($(this).closest("#tr").find(".price").val());
          $(this).closest("#tr").find(".total").val(price*qty);
          console.log("qty:"+price*qty);
          grand_total();
        });      
        
       










      } //function ends here
      





     
       $(document).ready(function(){
     
  //       $("input").focus(function(){
  //   $(this).css("background-color", "yellow");
  // });
  // $("input").blur(function(){
  //   $(this).css("background-color", "green");
  // });



       $("#btn-add-row").on("click",function () {

          console.log("ulla than erukean over over");
          //alert("hi baby");
          var i=$('#table #tr').length;
        var row="<tr id='tr'> <td><input type='text'  data-type='productcode' required name='code[]' data-field-name='code' class='form-control autocomplete_txt' id='codecheck_"+i+"' autofocus></td><td><input type='text'  data-type='productname' required name='pname[]' class='form-control ' id='namecheck_"+i+"'></td> <td><input type='text' required name='price[]' class='form-control price' id='pricecheck_"+i+"'></td> <td><input type='text' required name='qty[]' class='form-control qty' id='quantitycheck_"+i+"'></td> <td><input type='text' required name='total[]' class='form-control total' id='totalcheck_"+i+"'></td> <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td> </tr>";
          $("#product_tbody").append(row);
             var getname="#codecheck_"+i;
            $(getname).focus();
           console.log(i);


  $(document).scannerDetection({

            timeBeforeScanTest: 200, // wait for the next character for upto 200ms
             avgTimeByChar: 100, // it's not a barcode if a character takes longer than 100ms
            
  onComplete: function(barcode, qty){
      $.ajax({
        url : 'http://localhost:8080/penquin/bill/bill_get_detail.php',
        type: "POST",
        data:{bar_code:barcode},
        success:function(data1){
           console.log(data1);

            var data1 = $.parseJSON(data1);
      if(data1.type == 'Success'){
        
        //Check Duplicate Value
        var barCode = document.querySelectorAll("input[name='code[]']");
        for(key=0; key < barCode.length - 1; key++)  {
          if(barCode[key].value == data1.bar_code){
            alert("Already Exist");
            return false;
          }         
        }
      
                     
                    
                 // $('#codecheck_'+element_id).val(ui.item.code),
                  $('#namecheck_'+i).val(data1.name),
                 $('#pricecheck_'+i).val(data1.sellingprice),
                 $('#quantitycheck_'+i).val("1"),
               
                  $('#totalcheck_'+i).val(data1.sellingprice);
                  grand_total();
                  dynamic_rows();
         }
        }
     });

    } // main callback function 
});





                
         $("input[name^='code']").autocomplete({
            minLength:1,autoFocus:true,

      source:function(request,response){
          console.log(request);
            $.ajax({
        url : 'http://localhost:8080/penquin/bill/json.php',
        type: "GET",
        dataType: 'json',
        success:function(data){
           //console.log(data);
          
          aData =$.map(data,function(value,key){
            return {
                 id:value.id,
                 label:value.code,
                 name:value.name,
                 sellingprice:value.sellingprice
            };
          });
          
          console.log(aData);
          
           var results=$.ui.autocomplete.filter(aData,request.term);
         
          console.log(results);
         
           response(results);
        }
     });
          },
          select:function(event,ui){
               //console.log(ui.value.name);
               id_arr = $(this).attr('id');
                     console.log("id_Arr"+id_arr);
                      id = id_arr.split("_");
                        console.log("id"+id);
                      element_id = id[id.length-1];
                        console.log("element id"+element_id);
                      //  console.log(ui.value.code);
                        //console.log(ui.value.name);
                        
                 //$(this).val(ui.item.code),$('#name_check').val(ui.item.name),
                  $('#codecheck_'+element_id).val(ui.item.code),
                  $('#namecheck_'+element_id).val(ui.item.name),
                 $('#pricecheck_'+element_id).val(ui.item.sellingprice),
                 $('#quantitycheck_'+element_id).val("1"),
               
                  $('#totalcheck_'+element_id).val(ui.item.sellingprice);
                  grand_total();
                    dynamic_rows();
    
         }
        });




 });

        
        $("body").on("click",".btn-row-remove",function(){
          if(confirm("Are You Sure?")){
            $(this).closest("#tr").remove();
            grand_total();
          }
        });

        $("body").on("keyup",".price",function(){
          var price=Number($(this).val());
          var qty=Number($(this).closest("#tr").find(".qty").val());
          $(this).closest("#tr").find(".total").val(price*qty);
          grand_total();
        });
        
        $("body").on("keyup",".qty",function(){
          var qty=Number($(this).val());
          var price=Number($(this).closest("#tr").find(".price").val());
          $(this).closest("#tr").find(".total").val(price*qty);
          grand_total();
        });      
        
       




  $(document).scannerDetection({

            timeBeforeScanTest: 200, // wait for the next character for upto 200ms
             avgTimeByChar: 100, // it's not a barcode if a character takes longer than 100ms
            
  onComplete: function(barcode, qty){
      $.ajax({
        url : 'http://localhost:8080/penquin/bill/bill_get_detail.php',
        type: "POST",
        data:{bar_code:barcode},
        success:function(data1){
           console.log(data1);

            var data1 = $.parseJSON(data1);
      if(data1.type == 'Success'){
        
        //Check Duplicate Value
        var barCode = document.querySelectorAll("input[name='code[]']");
        for(key=0; key < barCode.length - 1; key++)  {
          if(barCode[key].value == data1.bar_code){
            alert("Already Exist");
            return false;
          }         
        }
      
                     
                    
                 // $('#codecheck_'+element_id).val(ui.item.code),
                  $('#namecheck_'+i).val(data1.name),
                 $('#pricecheck_'+i).val(data1.sellingprice),
                 $('#quantitycheck_'+i).val("1"),
               
                  $('#totalcheck_'+i).val(data1.sellingprice);
                  grand_total();
                    dynamic_rows();
         }
        }
     });

    } // main callback function 
});



         $("input[name^='code']").autocomplete({
            minLength:1,autoFocus:true,

      source:function(request,response){
          console.log(request);
            $.ajax({
        url : 'http://localhost:8080/penquin/bill/json.php',
        type: "GET",
        dataType: 'json',
        success:function(data){
           //console.log(data);
          
          aData =$.map(data,function(value,key){
            return {
                 id:value.id,
                 label:value.code,
                 name:value.name,
                 sellingprice:value.sellingprice
            };
          });
          
          console.log(aData);
          
           var results=$.ui.autocomplete.filter(aData,request.term);
         
          console.log(results);
         
           response(results);
        }
     });
          },
          select:function(event,ui){
               //console.log(ui.value.name);
               id_arr = $(this).attr('id');
                     console.log("id_Arr"+id_arr);
                      id = id_arr.split("_");
                        console.log("id"+id);
                      element_id = id[id.length-1];
                        console.log("element id"+element_id);
                      //  console.log(ui.value.code);
                        //console.log(ui.value.name);
                        
                 //$(this).val(ui.item.code),$('#name_check').val(ui.item.name),
                  $('#codecheck_'+element_id).val(ui.item.code),
                  $('#namecheck_'+element_id).val(ui.item.name),
                 $('#pricecheck_'+element_id).val(ui.item.sellingprice),
                 $('#quantitycheck_'+element_id).val("1"),
               
                  $('#totalcheck_'+element_id).val(ui.item.sellingprice);
                  grand_total();
                 //   dynamic_rows();
    
         }
        });


















      });







   
   

  
    </script>
</body>
</html
