<?php
session_start();
$con = mysqli_connect("localhost","root","","clearance");

if(isset($_POST['save_radio']))
{
    $school  = $_POST['school'];

    $query = "INSERT INTO demo  VALUES ($school')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'];
        header("Location: form.php");
    }
    else{
        $_SESSION['status'] ;
        header("Location: form.php");
    }
}
?>