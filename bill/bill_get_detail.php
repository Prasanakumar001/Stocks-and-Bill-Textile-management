<?php
$conn=mysqli_connect("localhost","root","","penquin");
@extract($_REQUEST);
if(!empty($_POST['bar_code'])){
			$bar_code = $conn->real_escape_string($_POST['bar_code']);
			//echo "<script>console.log($bar_code)</script>";
			$sql = $conn->query("SELECT * FROM product WHERE code = '$bar_code'");
			$numRow = $sql->num_rows;
			if($numRow > 0){
				$row = $sql->fetch_array();
				$detail = array('type'=>'Success','code'=>$row['code'],'name'=>$row['name'],'sellingprice'=>$row['sellingprice'] );
				echo json_encode($detail);
			}else{
				$detail = array('type'=>'Error');
				echo json_encode($detail);
			}
		}
?>