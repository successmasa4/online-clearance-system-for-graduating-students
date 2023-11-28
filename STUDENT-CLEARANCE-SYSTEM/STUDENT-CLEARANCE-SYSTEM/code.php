<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "clearance");

if (isset($_POST['save_multiple_checkbox'])) {
    $brands = $_POST['brands'];

    // Use prepared statements to avoid SQL injection
    $query = "INSERT INTO list (name) VALUES (?)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        // Bind the parameter to the prepared statement
        mysqli_stmt_bind_param($stmt, "s", $item);

        foreach ($brands as $item) {
            // Escape the user input to prevent SQL injection
            $item = mysqli_real_escape_string($con, $item);

            // Execute the prepared statement
            mysqli_stmt_execute($stmt);
        }

        $_SESSION['status'] = "Congratulations you are now cleared for Graduation";
        header("Location: form.php");
    } else {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: form.php");
    }

    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
