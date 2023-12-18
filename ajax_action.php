<?php

  $con=mysqli_connect("localhost","root","","penquin");
  
  $action=$_POST["action"];
  if($action=="Insert"){
    $name=mysqli_real_escape_string($con,$_POST["name"]);
    $quantity=mysqli_real_escape_string($con,$_POST["quantity"]);
    $size=mysqli_real_escape_string($con,$_POST["size"]);
     $baseprice=mysqli_real_escape_string($con,$_POST["baseprice"]);
    $sellingprice=mysqli_real_escape_string($con,$_POST["sellingprice"]);
    $code=$sellingprice.$baseprice.$sellingprice;
    $code =(int)$code+2023;
    $created= date("d,M,Y h:i:s A");
     
    $sql="insert into product (name,quantity,size,baseprice,sellingprice,code,created) values ('{$name}','{$quantity}','{$size}','{$baseprice}','{$sellingprice}','{$code}','{$created}') ";

    if($con->query($sql)){
      $id=$con->insert_id;
      echo "
        <tr uid='{$id}'>
          
              <td>{$code}</td>
              <td>{$name}</td>
              <td>{$quantity}</td>
              <td>{$size}</td>
              <td>{$baseprice}</td>
              <td>{$sellingprice}</td>
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