<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance for Graduation</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

     <nav class="navbar navbar-danger bg-danger sticky-top">
       <a class="navbar-brand" href="my-profile.php"><i class="fas fa-backward"></i> Back</a>
       <a class="button" href="logout.php"><i class="fas fa-backward"></i> Logout</a>
    </nav>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Select the Departments for Clearance</h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST">

                            <div class="form-group mb-3">
                                <input type="checkbox" name="brands[]" value="Farm" required> Farm Department <br><br>
                                <input type="checkbox" name="brands[]" value= "Catering" required> Catering Department <br><br>
                                <input type="checkbox" name="brands[]" value="Security" required> Security Department <br><br>
                                <input type="checkbox" name="brands[]" value="Computing" required> Computing Department <br><br>
                                <input type="checkbox" name="brands[]" value="engineering" required> engineering <br><br>
                                <input type="checkbox" name="brands[]" value="Mathematics" required> Mathematics Department <br><br>
                                <input type="checkbox" name="brands[]" value="DEAN(Business)" required> Business Department <br><br>
                                 <input type="checkbox" name="brands[]" value="Library" required> Library <br><br>
                                 <input type="checkbox" name="brands[]" value="DEAN(EDUC)" required> DEAN(EDUC) <br><br>
                                 <input type="checkbox" name="brands[]" value="Transport" required> Transport <br><br>
                                 <input type="checkbox" name="brands[]" value="Games" required> Games <br><br>
                                 <input type="checkbox" name="brands[]" value="ICT" required> ICT <br><br>
                                 <input type="checkbox" name="brands[]" value="Halls" required> Halls <br><br>

                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="save_multiple_checkbox" class="btn btn-secondary">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>