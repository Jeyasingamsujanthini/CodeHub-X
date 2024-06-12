<?php

$username1 = $_POST['username1'];
$username2 = $_POST['username2'];
$mail      = $_POST['mail'];
$password1  = $_POST['password1'];
$password2 = $_POST['password2'];



if (!empty($username1) || !empty($username2) || !empty($mail) || !empty($password1) || !empty($password2))
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project";



    //create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()){
        die('Connect Error ('.
        mysqli_connect_errno() .')'
        . mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT mail from register where mail = ? limit 1"
        ;
        $INSERT = "INSERT Into register ( username1 , username2 , mail , password1 , password2) values(?,?,?,?,?)";

        //prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $stmt->fetch();
        $rnum = $stmt->num_rows;

        //checking username
        if ($rnum==0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssss", $username1, $username2, $mail, $password1, $password2);
            $stmt->execute();
            echo "New record inserted successfully";
        } else {
            echo "Someone already register using this email";
        }
        $stmt->close();
        $conn->close();

    }
} else {
    echo "All field are required";
    die();
}


?>