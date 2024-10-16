<?php
session_start();
if (!$_SESSION['id']){
    header('location:home.php');
    exit;
}
$name=$_SESSION['id'];
echo $name;
//option
$option=$_POST['gets'];
//symptoms
$symp=$_POST['sym'];
echo $option;
$conn=mysqli_connect('localhost','root','','expert');
if (!$conn){
    die("could not connect to the database");
}
    $delete="DELETE FROM response Where answers='$symp' and id='$name'";
    mysqli_query($conn,$delete);
    $insert="INSERT INTO response(effect,answers,id) VALUES ('$option','$symp','$name')";
    mysqli_query($conn,$insert);


