<?php 

$Email =$_POST['Email'];
$Password = $_POST['Password'];



//talk to database
$con = new mysqli("localhost", "root","","registration");
if($con->connect_error){
    die("Failed to retrieve information need!". $con->connect_error);
}else{
    $stmt = $con->prepare("select * from users where email = ?");
    $stmt->bind_param('s', $Email);
    $stmt-> execute();
    $stmt_result = $stmt->get_result();
     if($stmt_result->num_rows>0){
        $data = $stmt_result->fetch_assoc();
        if($data['Password'] === $Password){
            echo "Login successful";
            header("Location: Last.html");
        }else{
          echo "Password is incorrect!!";
        }     
    }else{
        echo "Please enter a Valid email";
     }
}
?>