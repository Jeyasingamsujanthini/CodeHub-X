<?php

session_start(); //Start session for user information

//Database connection details 
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";

//connect to database
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Sanitize user input (prevent SQL injection)
$username_mail = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

//prepare login query (allow login by username or email)
$SELECT = "SELECT username, password_hash FROM register WHERE username = ? OR mail = ?";

$stmt = $conn->prepare($SELECT);
$stmt->bind_param("ss", $username_mail, $username_mail); //Bind username/email twice for both search options

//execute query
$stmt->execute();

//Get result 
$stmt->bind_result($db_usernam, $db_password_hash);
$stmt->fetch();

//close statement
$stmt->close();

//verify credentials
if (password_verify($password, $db_password_hash)) {
    $_SESSION["username"] = $db_username; //Store username in session
    header("Location: protected_page.php"); //Redirect to protected area
}else {
    echo "Invalid username or password";
}

$conn->close();
?>