<?php 
error_reporting(0);
include('config.php');
@extract($_REQUEST);
if(!empty($_POST['action_type'])){
	$action_type = $conn->real_escape_string($_POST['action_type']);
	switch($action_type){
		case "add_new":
		$parma['name'] = $conn->real_escape_string($_POST['name']);
		$parma['status'] = $conn->real_escape_string($_POST['status']);
		$parma['created'] = $conn->real_escape_string(date('Y-m-d h:i:s'));
		
		$sql = sprintf('INSERT INTO category (%s) VALUES ("%s")',implode(',',array_keys($parma)),implode('","',array_values($parma)));
		$conn->query($sql);
		if($conn->insert_id){
			echo "New Category Has Been Added Successfully !";
		}else{
			echo "Something Went Wrong!";
		}
		
		case "update":
		if(!empty($_POST['id'])){
			$id = $conn->real_escape_string($_POST['id']);
			$parma['name'] = $conn->real_escape_string($_POST['name']);
			$parma['status'] = $conn->real_escape_string($_POST['status']);
			foreach($parma as $field => $val) {
				$fields[] = "$field = '$val'";
			}
			$query = "UPDATE category SET " . join(', ', $fields) . " WHERE id = ".$id;
			if($conn->query($query)){
				echo "Category Has Been Updated Successfully !";
			}else{
				echo "Something Went Wrong !";
			}
		}
		break;
		
		case "remove":
		if(!empty($_POST['id'])){
			$id = $conn->real_escape_string($_POST['id']);
			$sql = "DELETE FROM category WHERE id = '$id'";
			if($conn->query($sql)){
				echo "Category Has Been Deleted Successfully !";
			}else{
				echo "Something Went Wrong !";
			}
		}
		break;	
	}
}
?>