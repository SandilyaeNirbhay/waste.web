<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

//Database connection
$conn = new mysqli('localhost','root','singupform');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);

}else{
    $stmt = $conn->prepare("insert into registration(firstname,lastname,email,password,confirmpassword) value(?,?,?,?,?)");
    $stmt->bind_param("sssss",$firstname,$lastname,$email,$password,$confirmpassword);
    $stmt->execute();
    echo "Signup Succesfully....";
    $stmt->close();
    $conn->close();
}
?>