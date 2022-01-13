<?php  

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "movie";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$Select = "SELECT email FROM user WHERE email = ? Limit 1";
$sql = "INSERT INTO user (name, email, password) 
VALUES (?, ?, ?)";

$stmt = $conn->prepare($Select);
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum = $stmt->num_rows;

if($rnum==0){
    $stmt->close();
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $name, $email, $password);
    $stmt->execute();
    echo "<script>alert('Account is created successfully')</script>";
    echo "<script>location.replace('index.html')</script>";
}
else{
    echo "<script>alert('Email Already Registered')</script>";
    echo "<script>location.replace('index.html')</script>";
}
$stmt->close();
$conn->close();

?>




















