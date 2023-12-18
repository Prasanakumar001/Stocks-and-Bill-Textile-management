
    <?php
//echo "<pre>";print_r($_POST);
  $con=mysqli_connect("localhost","root","","penquin");
   if($_POST['action']=="fetch_size"){
       $name_id=$_POST['name_id'];
        $sql="select size from product where id='.$name_id.'";
        
   $result = $conn->query($sql);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    foreach ($options as $option) {
  $output .='
    <option value="'.$option['id'].'">'.$option['name'].'</option>';
   
 }
    }
  ?>