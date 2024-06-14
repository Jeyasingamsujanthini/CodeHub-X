<?php

if(!isset($_POST['Sign In']))
{
    $uname = $_POST['username'];
    $pword = $_POST['password'];
    $con = mysqli_connect("localhost:3306","root","","project");
    $sql = "SELECT * from register WHERE mail = '$uname' AND password1 = '$pword' ";
    $result = mysqli_query($con,$sql);
    $resultcheck = mysqli_num_rows($result);

    if($resultcheck>0)
    {
        header("Location: note.html");
        exit();
    }
    else{
        echo "Username or password incorrect.";
    }
}


?>