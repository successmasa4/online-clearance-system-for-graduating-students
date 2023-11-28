<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "clearance");

if (isset($_POST['save_radio'])) {
    $school = $_POST['school'];

    // Escape the user input to prevent SQL injection
    $school = mysqli_real_escape_string($con, $school);

    // Fix the SQL query by providing column names explicitly
    $query = "INSERT INTO demo (department_name) VALUES ('$school')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data inserted successfully";
        header("Location: form.php");
    } else {
        $_SESSION['status'] = "Data insertion failed";
        header("Location: form.php");
    }
}
?>
