<?php
    $FirstName =$_POST['FirstName'];
    $MiddleName =$_POST['MiddleName'];
    $LastName =$_POST['LastName'];
    $Gender =$_POST['Gender'];
    $Email =$_POST['Email'];
    $Address =$_POST['Address'];
    $Number =$_POST['Number'];
    $Password =$_POST['Password'];


  $conn = new mysqli('localhost','root','','registration');
  if ($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
  }else{
    $stmt= $conn->prepare("insert into users(FirstName, MiddleName, LastName, Gender, Address, Email, Number ) 
    values(?,?,?,?,?,?,?)");
    
    $stmt->bind_param("ssssssi",$FirstName, $MiddleName, $LastName,$Gender, $Address, $Email, $Number);
    $stmt->execute();
    echo "Record added successfully";
    $stmt->close();
    $conn->close();
}
?>