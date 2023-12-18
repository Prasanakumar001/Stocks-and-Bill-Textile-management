<?php

  $con=mysqli_connect("localhost","root","","penquin");
  
  $action=$_POST["action"];
 
  if($action=="Insert"){
    $name=mysqli_real_escape_string($con,$_POST["name"]);
    $quantity=mysqli_real_escape_string($con,$_POST["quantity"]);
    $created= date("d,M,Y h:i:s A");
    $productname="hi";
    $size="m";

   $getnamesize="select name,size from product where id={$name}";
      $res1=$con->query($getnamesize);
      while($row=mysqli_fetch_array($res1)){
        
        $productname= $row["name"];
        $size = $row["size"];
        
      }





    $sql="insert into stocks (productid,quantity,created) values ('{$name}','{$quantity}','{$created}') ";

    if($con->query($sql)){
      $id=$con->insert_id;
      
      echo "
        <tr uid='{$id}'>
          
             
              <td>{$productname}</td>
               <td>{$size}</td>
              <td>{$quantity}</td>
              <td>{$created}</td>
            
          <td><a href='#' class='btn btn-danger delete'>Delete</a></td>
        </tr>";
    }else{
      echo false;
    }

  // }else if($action=="Update"){
  //   $id=mysqli_real_escape_string($con,$_POST["id"]);
  //   $name=mysqli_real_escape_string($con,$_POST["name"]);
  //   $gender=mysqli_real_escape_string($con,$_POST["gender"]);
  //   $contact=mysqli_real_escape_string($con,$_POST["contact"]);
  //   $sql="update users SET NAME='{$name}',GENDER='{$gender}',CONTACT='{$contact}' where ID='{$id}'";
  //   if($con->query($sql)){
  //     echo "
  //       <td>{$name}</td>
  //       <td>{$gender}</td>
  //       <td>{$contact}</td>
  //       <td><a href='#' class='btn btn-primary edit'>Edit</a></td>
  //       <td><a href='#' class='btn btn-danger delete'>Delete</a></td>";
        
  //   }else{
  //     echo false;
  //   }
  }else if($action=="Delete"){
    $id=$_POST["uid"];
    $sql="delete from product where id='{$id}'";
    if($con->query($sql)){
      echo true;
    }else{
      echo false;
    }
  }
?>