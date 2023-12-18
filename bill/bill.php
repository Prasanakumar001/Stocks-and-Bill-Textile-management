
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Penquin</title>

                                                   <!-----------------------------not to change------------------------------------------->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel='stylesheet' href='https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css'>
    <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.min.js" integrity="sha256-R6eRO29lbCyPGfninb/kjIXeRjMOqY3VWPVk6gMhREk=" crossorigin="anonymous"></script> 

                                                   <!-----------------------------not to change------------------------------------------->
  


 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
                     <!-----------------------------scanner---------------------------------->

<script src="https://rawgit.com/kabachello/jQuery-Scanner-Detection/master/jquery.scannerdetection.js"></script>
  </head>
  <body>
   
 
 
    <div class='container pt-5'>
      <h1 class='text-center text-primary'>Create Printable PDF invoice using PHP MySQL</h1><hr>
      <?php
        $con=mysqli_connect("localhost","root","","penquin");
        if(isset($_POST["submit"])){
          $invoice_no=$_POST["invoice_no"];
          $invoice_date=date("Y-m-d",strtotime($_POST["invoice_date"]));
          $grand_total=mysqli_real_escape_string($con,$_POST["grand_total"]);
          
          $sql="insert into invoice (invoiceno,invoicedate,grandtotal) values ('{$invoice_no}','{$invoice_date}','{$grand_total}') ";
          if($con->query($sql)){
            $sid=$con->insert_id;
            
            $sql2="insert into invoiceproducts (sid,code,pname,price,qty,total) values ";
            $rows=[];

            for($i=0;$i<count($_POST["pname"]);$i++)
            {
            if(!empty($_POST["pname"][$i][2]) && !empty($_POST["pname"][$i][4])){
              $code=mysqli_real_escape_string($con,$_POST["code"][$i]);
              $pname=mysqli_real_escape_string($con,$_POST["pname"][$i]);
              $price=mysqli_real_escape_string($con,$_POST["price"][$i]);
              $qty=mysqli_real_escape_string($con,$_POST["qty"][$i]);
              $total=mysqli_real_escape_string($con,$_POST["total"][$i]);
              $rows[]="('{$sid}','{$code}','{$pname}','{$price}','{$qty}','{$total}')";
            }
            
            }
            $sql2.=implode(",",$rows);
            if($con->query($sql2)){
              echo "<div class='alert alert-success'>Invoice Added Successfully. <a href='print.php?id={$sid}' target='_BLANK'>Click </a> here to Print Invoice </div> ";
            }else{
              echo "<div class='alert alert-danger'>Invoice Added Failed.</div>";
            }
          }else{
            echo "<div class='alert alert-danger'>Invoice Added Failed.</div>";
          }
        }
        
      ?>
      <form method='post' action='bill.php' autocomplete='off'>
        <div class='row'>
          <div class='col-md-4'>
            <h5 class='text-success'>Invoice Details</h5>
            <div class='form-group'>
              <label>Invoice No</label>
              <input type='text' name='invoice_no' required class='form-control' value="1" readonly>
            </div>
            <div class='form-group'>
              <label>Invoice Date</label>
              <input type='text' name='invoice_date' id='date' value="<?php echo date('d,M,Y');?>" required class='form-control' readonly>
            </div>
          </div>
        <!--   <div class='col-md-8'>
            <h5 class='text-success'>Customer Details</h5>
            <div class='form-group'>
              <label>Name</label>
              <input type='text' name='cname' required class='form-control'>
            </div>
            <div class='form-group'>
              <label>Address</label>
              <input type='text' name='caddress' required class='form-control'>
            </div>
            <div class='form-group'>
              <label>City</label>
              <input type='text' name='ccity' required class='form-control'>
            </div>
          </div>
 -->     </div>
        <div class='row'>
          <div class='col-md-12'>
            <h5 class='text-success'>Product Details</h5>
            <table class='table table-bordered' >
              <thead>
                <tr>

                  <th>code</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id='product_tbody'>
                <tr>
                 
                  <td><input type='text' required name='code[]' class='form-control autocomplete_txt' data-field-name='code'  id="code" autofocus ></td>
                  <td><input type='text' required name='pname[]' class='form-control ' id="name" ></td>
                  <td><input type='text' required name='price[]' class='form-control price' id="price"></td>
                  <td><input type='text' required name='qty[]' class='form-control qty' id="quantity"></td>
                  <td><input type='text' required name='total[]' class='form-control total' id="total"></td>
                  <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td>
                </tr>

                 <script type="text/javascript">
                    var i=$('table tr').length;
                    console.log("hi"+i);
                    code="codecheck_"+i;
                    name="namecheck_"+i;
                    price="pricecheck_"+i;
                    quantity="quantitycheck_"+i;
                    totalcheck="totalcheck_"+i;
                    console.log(code);
                      document.getElementById('code').id = code;
                      // document.getElementById('code').value = code;
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
                  <td><input type='text' name='grand_total' id='grand_total' class='form-control' id="grand_check" required></td>
                </tr>
              </tfoot>
            </table>
            <input type='submit' name='submit' value='Save Invoice' class='btn btn-success float-right' onclick="return confirm('do you want to save? ');">
          </div>
        </div>
      </form>
    </div>
    <style>
     /* .autocomplete_txt{
        width: 20px;
        height:100px;
      }
*/    </style>
    <script>



      function dynamic_rows(){
         //$("input[name^='code']").focus()
       var i=$('table tr').length;
        var row="<tr> <td><input type='text'  data-type='productcode'  name='code[]' data-field-name='code' class='form-control autocomplete_txt' id='codecheck_"+i+"' autofocus></td><td><input type='text'  data-type='productname'  name='pname[]' class='form-control ' id='namecheck_"+i+"'></td> <td><input type='text'  name='price[]' class='form-control price' id='pricecheck_"+i+"'></td> <td><input type='text'  name='qty[]' class='form-control qty' id='quantitycheck_"+i+"'></td> <td><input type='text'  name='total[]' class='form-control total' id='totalcheck_"+i+"'></td> <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td> </tr>";
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
            $(this).closest("tr").remove();
            grand_total();
          }
        });

        $("body").on("keyup",".price",function(){
          var price=Number($(this).val());
          var qty=Number($(this).closest("tr").find(".qty").val());
          $(this).closest("tr").find(".total").val(price*qty);
          grand_total();
        });
        
        $("body").on("keyup",".qty",function(){
          var qty=Number($(this).val());
          var price=Number($(this).closest("tr").find(".price").val());
          $(this).closest("tr").find(".total").val(price*qty);
          grand_total();
        });      
        
       










      } //function ends here
      


 function grand_total(){
          var tot=0;
          $(".total").each(function(){
            tot+=Number($(this).val());
          });
          tot=parseFloat(tot).toFixed(2);
          $("#grand_total").val(tot);
        }
     
       


     
       $(document).ready(function(){
     
  //       $("input").focus(function(){
  //   $(this).css("background-color", "yellow");
  // });
  // $("input").blur(function(){
  //   $(this).css("background-color", "green");
  // });



       $("#btn-add-row").on("click",function () {

          console.log("ulla than erukean over over");
          alert("hi baby");
          var i=$('table tr').length;
        var row="<tr> <td><input type='text'  data-type='productcode' required name='code[]' data-field-name='code' class='form-control autocomplete_txt' id='codecheck_"+i+"' autofocus></td><td><input type='text'  data-type='productname' required name='pname[]' class='form-control ' id='namecheck_"+i+"'></td> <td><input type='text' required name='price[]' class='form-control price' id='pricecheck_"+i+"'></td> <td><input type='text' required name='qty[]' class='form-control qty' id='quantitycheck_"+i+"'></td> <td><input type='text' required name='total[]' class='form-control total' id='totalcheck_"+i+"'></td> <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td> </tr>";
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
            $(this).closest("tr").remove();
            grand_total();
          }
        });

        $("body").on("keyup",".price",function(){
          var price=Number($(this).val());
          var qty=Number($(this).closest("tr").find(".qty").val());
          $(this).closest("tr").find(".total").val(price*qty);
          grand_total();
        });
        
        $("body").on("keyup",".qty",function(){
          var qty=Number($(this).val());
          var price=Number($(this).closest("tr").find(".price").val());
          $(this).closest("tr").find(".total").val(price*qty);
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
                    dynamic_rows();
    
         }
        });


















      });







   
   

  
    </script>
  </body>
</html>