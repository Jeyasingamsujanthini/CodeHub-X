<?php

$user1 = $_POST['username1'];
$user2 = $_POST['username2'];
$mail  = $_POST['mail'];
$pword1= $_POST['password1'];
$pword2 = $_POST['password2'];

$con=mysqli_connect("localhost","root","","project");
$sql="INSERT INTO register (username1 , username2 , mail , password1 , password2) values('$user1','$user2','$mail','$pword1','$pword2')";
$r=mysqli_query ($con,$sql);

if ($r)
{
    header("Location: sign-in_page.html");
    exit();
}
else{
    echo "SOME ALREADY REGISTERED USING THIS EMAIL";
}



?>