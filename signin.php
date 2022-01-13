<?php

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "movie";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$email = $_POST["email"];
$password = $_POST["password"];


$Select = "SELECT * FROM user WHERE email = '$email' AND password = '$password' ";
$sql = mysqli_query($conn, $Select);
$row = mysqli_fetch_array($sql);


if ($email=="" || $password==""){
    echo "<script>alert('Please Enter email and password')</script>";
    echo "<script>location.replace('index.html')</script>";
}

if ($row['email']==$email && $row['password']==$password){
    echo "<script>alert('Login successful')</script>";
	echo "<script>location.replace('home.html')</script>";
}

else{
	echo "<script>alert('Login failed')</script>";
	echo "<script>location.replace('index.html')</script>";
}
?>