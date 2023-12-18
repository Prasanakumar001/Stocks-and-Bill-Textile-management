<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Penquin</title>
   
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  </head>




  <body>

<!-- <div class="modal" tabindex="-1" role="dialog" id='modal_frm'> -->
  <div class="modal" tabindex="-1"role="dialog"  id='modal_frm'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Stockin Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='frm'>
      <input type='hidden' name='action' id='action' value='Insert'>
      <input type='hidden' name='id' id='uid' value='0'>
    <!--   <div class='form-group'>
        <label>Name</label>
        <input type='text' name='name' id='name' required class='form-control'>
      </div> -->
      <div class='form-group'>
        <label>Quantity</label>
        <input type='text' name='quantity' id='quantity' required class='form-control'>
      </div>
       <div class='form-group'>
        <label>name</label>
        <select name='name' id='name' required class='form-control'>
          <option value=''>Select</option>
          <?php
            $conn=mysqli_connect("localhost","root","","penquin");
           $query="select name,id from product";
              $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
           ?>
              <!-- <option>Select Course</option> -->
  <?php 
  foreach ($options as $option) {
  ?>
    <option value='<?php echo $option['id']; ?>'><?php echo $option['name']; ?> </option>
    <?php 
    }
   ?>
          
        </select>
      <div class='form-group'>
        <label>Size</label>
        <select name='size' id='size' required class='form-control'>
          <option value=''>Select</option>
          <option value='Small'>Small</option>
      
        </select>
      </div>
      <div class='form-group'>
        <label>Baseprice</label>
        <input type='text' name='baseprice' id='baseprice' required class='form-control'>
      </div>
      <div class='form-group'>
        <label>Sellingprice</label>
        <input type='text' name='sellingprice' id='sellingprice' required class='form-control'>
      </div>
      <input type='submit' value='Submit' class='btn btn-success'>
    </form>
      </div>
    </div>
  </div>
</div>

  <div class='container mt-5'>
      <p class='text-right'><a href='#' class='btn btn-success' id='add_record'>Add Record</a></p>
    
    <table  id="example" class="display">
      <!-- class='table table-bordered' -->
    <thead>
       <th>Code</th>
      <th>Name</th>
      <th>Quantity</th>
      <th>Size</th>
      <th>Baseprice</th>
      <th>Sellingprice</th>
      
      <th>Created</th>
      <!-- <th>Updated</th> -->
      <!-- <th>Edit</th> -->
      <th>Delete</th>
    </thead>
    <tbody id='tbody'>
      <?php 
        $con=mysqli_connect("localhost","root","","penquin");
        $sql="select * from product";
        $res=$con->query($sql);
        while($row=$res->fetch_assoc()){
          echo "
            <tr uid='{$row["id"]}'>
              <td>{$row["code"]}</td>
              <td>{$row["name"]}</td>
              <td>{$row["quantity"]}</td>
              <td>{$row["size"]}</td>
              <td>{$row["baseprice"]}</td>
              <td>{$row["sellingprice"]}</td>
              <td>{$row["created"]}</td>
            
              <!-- <td><a href='#' class='btn btn-primary edit'>Edit</a></td> -->
              <td><a href='#' class='btn btn-danger delete'>Delete</a></td>
            </tr>
          ";
        }
      ?>
    </tbody>
    </table>
  </div>
    <script>
       $(document).ready(function() {
    $('#name').change(function(){
      var name_id=$("#name").val();
      alert("name id is"+name_id);
      $.ajax({
        url:"ajax_action.php",
        type:"POST",
        data:{
          name_id:name_id,
          action:'fetch_size'
        },
        success:function(response){
          console.log(response)
        }
      });
    });
} );
   $(document).ready(function() {
    $('#example').DataTable( {
        order: [[ 3, 'desc' ], [ 0, 'asc' ]]
    } );
} );

      $(document).ready(function(){
        var current_row=null;
        // var $caption=$(this).html();
        $("#add_record").click(function(){
          console.log("clicked");
          $("#modal_frm").modal();
        });
        
        $("#frm").submit(function(event){
          event.preventDefault();
          $.ajax({
            url:"ajax_action.php",
            type:"post",
            data:$("#frm").serialize(),
            beforeSend:function(){
              //$("#frm").find("input[type='submit']").attr('disabled',true).html('Loading...');
              $("#frm").find("input[type='submit']").val('Loading...');
            },
            success:function(res){
             //  $("#frm").find("input[type='submit']").attr('disabled',false).html($caption);
              if(res){
                if($("#uid").val()=="0"){
                  $("#tbody").append(res);
                }else{
                  $(current_row).html(res);
                }
              }else{
                alert("Failed Try Again");
              }
              $("#frm").find("input[type='submit']").val('Submit');
              clear_input();
              $("#modal_frm").modal('hide');
            }
          });
        });
        
        // $("body").on("click",".edit",function(event){
        //   event.preventDefault();
        //   current_row=$(this).closest("tr");
        //   $("#modal_frm").modal();
        //   var id=$(this).closest("tr").attr("uid");
        //   code
        //   var name=$(this).closest("tr").find("td:eq(0)").text();
          
          
        //   $("#action").val("Update");
        //   $("#uid").val(id);
        //   $("#name").val(name);
        //   $("#gender").val(gender);
        //   $("#contact").val(contact);
        // });
        
        $("body").on("click",".delete",function(event){
          event.preventDefault();
          var id=$(this).closest("tr").attr("uid");
          var cls=$(this);
          if(confirm("Are You Sure")){
            $.ajax({
              url:"ajax_action.php",
              type:"post",
              data:{uid:id,action:'Delete'},
              beforeSend:function(){
                $(cls).text("Loading...");
              },
              success:function(res){
                if(res){
                  $(cls).closest("tr").remove();
                }else{
                  alert("Failed TryAgain");
                  $(cls).text("Try Again");
                }
              }
            });
          }
        });
        
        function clear_input(){
          $("#frm").find(".form-control").val("");
          $("#action").val("Insert");
          $("#uid").val("0");
        }
      });
    </script>
  </body>
</html>