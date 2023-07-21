<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>

     <nav class="navbar navbar-danger bg-danger sticky-top">
       <a class="navbar-brand" href="my-profile.php"><i class="fas fa-backward"></i> Back</a>
    </nav>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            
                        <?php
                         unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Select Your School</h4>
                    </div>
                    <div class="card-body">

                        <form action="code1.php" method="POST">
                            <div class="form-group mb-3">
                                <input type="radio" name="school" value="Science" required /> Science<br><br>
                                <input type="radio" name="school" value="Business" required /> Business<br><br>
                                <input type="radio" name="school" value="Education" required /> Education<br><br>
                                <input type="radio" name="school" value="engineering" required /> engineering
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="save_radio" class="btn btn-danger">Submit</button>
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