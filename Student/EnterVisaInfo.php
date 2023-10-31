<?php
include_once 'StudentsSession.php';
include_once '../connection.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$sql="SELECT * FROM user where email = '$email' AND password = '$password'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BULSU CMS - Enter Visa Info</title>
    <link rel="icon" href="../image/oia.png" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html,
        body {
            height: 100%;
        }

        .container-fluid {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .row.flex-grow-1 {
            flex-grow: 1;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="../image/oia.png" alt="Logo" height="50">
        BULSU Internationalization
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a href="Gallery.php" class="nav-link" >Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link"><?php echo $email?></span>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    
                </div>
            </div>
        </div>
        <div class="row flex-grow-1">
            <div class="col-md-2 bg-light">
                <ul class="list-unstyled">
                <li><a href=""></a></li>
                <li><a href="RequestFile.php">Request file</a></li>
                    <li><a href="ViewRequests.php">View Request file</a></li>
                    <li><a href="EnterVisaInfo.php">Visa Info</a></li>
                    <li><a href="ViewUser.php">My Profile</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="container mt-5">
                <form action="process_visa_info.php" method="post">
            <div class="form-group">
                <label for="college">College</label>
                <input type="text" class="form-control" id="college" name="college" required>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="sex">Sex</label>
                <input type="text" class="form-control" id="sex" name="sex" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>

            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" class="form-control" id="birthday" name="birthday" required>
            </div>

            <div class="form-group">
                <label for="nationality">Nationality</label>
                <input type="text" class="form-control" id="nationality" name="nationality" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="form-group">
                <label for="guardian">Guardian</label>
                <input type="text" class="form-control" id="guardian" name="guardian" required>
            </div>

            <div class="form-group">
                <label for="contact_no">Contact No.</label>
                <input type="text" class="form-control" id="contact_no" name="contact_no" required>
            </div>

            <div class="form-group">
                <label for="course">Course</label>
                <input type="text" class="form-control" id="course" name="course" required>
            </div>

            <div class="form-group">
                <label for="passport_no">Passport Number</label>
                <input type="text" class="form-control" id="passport_no" name="passport_no" required>
            </div>

            <div class="form-group">
                <label for="date_of_issue">Date of Issue</label>
                <input type="date" class="form-control" id="date_of_issue" name="date_of_issue" required>
            </div>

            <div class="form-group">
                <label for="date_of_expiration">Date of Expiration</label>
                <input type="date" class="form-control" id="date_of_expiration" name="date_of_expiration" required>
            </div>

            <div class="form-group">
                <label for="visa_expiration">Visa Expiration</label>
                <input type="date" class="form-control" id="visa_expiration" name="visa_expiration" required>
            </div>

            <div class="form-group">
                <label for="date_of_admission">Date of Admission</label>
                <input type="date" class="form-control" id="date_of_admission" name="date_of_admission" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>

            <div class="form-group">
                <label for="student_no">Student No.</label>
                <input type="text" class="form-control" id="student_no" name="student_no" required>
            </div>

            <div class="form-group">
                <label for="record">Record</label>
                <input type="text" class="form-control" id="record" name="record" required>
            </div>

            <div class="form-group">
                <label for="visa_status_passport">Visa Status (Passport)</label>
                <input type="text" class="form-control" id="visa_status_passport" name="visa_status_passport" required>
            </div>

            <div class="form-group">
                <label for="visa_status">Visa Status</label>
                <input type="text" class="form-control" id="visa_status" name="visa_status" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
                </div>
    
            </div>
            
    
        </div>
      
    </div>
 <!--   <footer class="mt-auto text-center bg-dark text-white py-3">
    <div class="container">
        <span class="text-muted">&copy; Jonald Acosta 2023</span>
    </div>
</footer> -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/Registration.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

</body>

</html>
