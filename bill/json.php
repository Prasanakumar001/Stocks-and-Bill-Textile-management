<?php
$con=mysqli_connect("localhost","root","","penquin");
$sql ="select * from product";
$result= mysqli_query($con,$sql);
$json_array = array();
while($row = mysqli_fetch_assoc($result))
{
	$json_array[] =$row;
	
}
echo json_encode($json_array);
exit();
//$json = json_encode($json_array);
//echo $json;
//$json = json_encode ( $json_array, JSON_FORCE_OBJECT );



// print_r($_POST);
// if(!empty($_POST['type'])){
// 	$type = $_POST['type'];
// 	$name = $_POST['name_startsWith'];
// 	//$query = "SELECT id,code,name,sellingprice FROM product where quantityInStock !=0 and UPPER($type) LIKE '".strtoupper($name)."%'";
// 	$query = "SELECT id,code,name,sellingprice FROM product where UPPER($type) LIKE '".strtoupper($name)."%'";
// 	$result = mysqli_query($con, $query);
// 	$data = array();
// 	while ($row = mysqli_fetch_assoc($result)) {
// 		$name = $row['id'].'|'.$row['code'].'|'.$row['name'].$row['sellingprice'];
// 		array_push($data, $name);
// 	}	
// 	echo json_encode($data);exit;
// }
?>