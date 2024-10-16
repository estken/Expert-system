<?php
session_start();
if (!$_SESSION['id']){
    header('location:home.php');
    exit;
}
$name=$_SESSION['id'];

$conn=mysqli_connect('localhost','root','','expert');
if (!$conn){
    die("could not connect to the database");
}

$delete="DELETE FROM response WHERE id='$name'";
mysqli_query($conn,$delete);
session_destroy();

header('location:../index.html');
exit(1);