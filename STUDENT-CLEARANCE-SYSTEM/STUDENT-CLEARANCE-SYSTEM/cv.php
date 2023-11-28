<?php
@include('includes/config.php');
if(isset($_GET['StudentRegno'])){
    $id  = $_GET['StudentRegno'];
  }

// Form data processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $heducation = $_POST["heducation"];
    $leducation = $_POST["leducation"];
    $experience = $_POST["experience"];
    $skills = $_POST["skills"];
    $skills2 = $_POST["skills2"];
    $admit = $_POST['admission'];
    $project = $_POST['project'];
    $course = $_POST['course'];
    $did = $_POST['did'];

    // Insert data into the database
    $sql = "INSERT INTO cv_data (full_name, email, admission, phone, address, heducation,course,leducation,did, experience, skills,skill2,projects)
            VALUES ('$full_name', '$email','$admit', '$phone', '$address', '$heducation','$course','$leducation','$did', '$experience', '$skills','$skills2','$project')";

    if ($bd->query($sql) === TRUE) {
        echo "CV submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $bd->error;
    }
}

$select = "SELECT * FROM students WHERE StudentRegno = '$id'";
$res = mysqli_query($bd,$select);
$row = mysqli_fetch_assoc($res);


$bd->close();
?>



<!DOCTYPE html>
<html>
<head>
    <title>CV Builder</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <h1>CV Builder for <?php echo $id?></h1>
    <form action="" method="post">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" required value="<?php echo $row['studentName']?>"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br>

        <label for="address">Admission:</label>
        <input type="text" name="admission" required value="<?php echo $row['StudentRegno']?>"><br>

        <label for="education">Higher Education:</label>
        <textarea name="heducation" rows="5" required></textarea><br>

        <label for="education">Course:</label>
        <input type="text" name="course" required><br>

        <label for="education">Lower Education:</label>
        <textarea name="leducation" rows="5" required></textarea><br>

        <label for="education">Couser/Did:</label>
        <input type="text" name="did" required><br>



        <label for="experience">Experience:</label>
        <textarea name="experience" rows="5" required></textarea><br>

        <label for="skills">Skill1:</label>
        <input type="text" name="skills" required><br>

        <label for="skills">Skill2:</label>
        <input type="text" name="skills2" required><br>

        <label for="skills">Projects:</label>
        <textarea name="project" rows="5" cols="50" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>
<style>
    /* Add your CSS styles here */
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1 {
    text-align: center;
}

form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

label,
input,
textarea {
    display: block;
    margin-bottom: 10px;
}

input[type="submit"] {
    margin-top: 10px;
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>
</html>
