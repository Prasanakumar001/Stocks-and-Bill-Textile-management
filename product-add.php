<?php
 include ("config.php" );
 $cat=$_POST['cat'] ;
$name =  $_POST['name' ]; 
$size =  $_POST['size' ]; 
$quantity =  $_POST['quantity' ]; 
$unit =  $_POST['unit' ]; 
$sql=  "INSERT  INTO `product`(`catname`,`productname` , `size` , `quantity` , `unit`)
 VALUE  ('{$cat}',' {$name} ' , ' {$size } ' , ' {$quantity } ' , ' {$unit } ')" ; 


if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record created succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record created failed!'
    ];
    print_r(json_encode($response));
} 
?> 