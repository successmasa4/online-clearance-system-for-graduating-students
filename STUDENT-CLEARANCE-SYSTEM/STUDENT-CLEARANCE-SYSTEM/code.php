<?php
session_start();
$con = mysqli_connect("localhost","root","","clearance");

if(isset($_POST['save_multiple_checkbox']))
{
    $brands = $_POST['brands'];
    // echo $brands;

    foreach($brands as $item)
    {
        // echo $item . "<br>";
        $query = "INSERT INTO list (name) VALUES ('$item')";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Congratulations you are now cleared for Graduation";
        header("Location: form.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: form.php");
    }
}
?>