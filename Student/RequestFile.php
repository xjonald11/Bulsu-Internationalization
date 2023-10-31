<?php
include_once '../connection.php';
include_once 'StudentsSession.php';

$uname = $_SESSION['email'];
$password = $_SESSION['password'];
$chekUser = mysqli_query($con,"Select * from user where email= '$uname' AND password = '$password'") or die(mysqli_error($con));
$row = mysqli_fetch_array($chekUser);
$fname = $row['fname'];
$lname = $row['lname'];

$username = $fname . " ".$lname;
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $student_name = htmlspecialchars(trim($_POST["student_name"]));
    $student_email = filter_var($_POST["student_email"], FILTER_SANITIZE_EMAIL);
    $requested_file = htmlspecialchars(trim($_POST["requested_file"]));

    // Now you have sanitized data, you can use it for further processing.
    // For example, you can insert it into the database or send an email to notify the request.

    // Example of inserting into a database
    $stmt = $con->prepare("INSERT INTO file_requests (student_name, student_email, requested_file) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $student_name, $student_email, $requested_file);

    if ($stmt->execute()) {
        echo "<script>alert('Request submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting request: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BULSU CMS</title>
    <link rel="icon" href="../image/oia.png" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../js/Registration.js"></script>
    <style>
        html, body {
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
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <span class="nav-link"><?php echo $username?></span>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <!-- Add any welcome message or instructions here -->
            </div>
        </div>
    </div>
    <div class="row flex-grow-1">
        <div class="col-md-2 bg-light">
            <ul class="list-unstyled">
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href="RequestFile.php">Request file</a></li>
                    <li><a href="ViewRequests.php">View Request file</a></li>
                    <li><a href="EnterVisaInfo.php">Visa Info</a></li>
                    <li><a href="ViewUser.php">My Profile</a></li>
            </ul>
        </div>
        <div class="col-md-10">
    <div id="content">
        <h1>Request a File</h1>
        <!-- Add your form for requesting files here -->
        <form action="" method="post">
    <div class="form-group">
        <label for="student_name">Your Name</label>
        <input type="text" class="form-control" id="student_name" name="student_name" required>
    </div>
    <div class="form-group">
        <label for="student_email">Your Email</label>
        <input type="email" class="form-control" id="student_email" name="student_email" required>
    </div>
    <div class="form-group">
        <label for="requested_file">Requested File</label>
        <input type="text" class="form-control" id="requested_file" name="requested_file" required>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
</form>
    </div>
</div>
    </div>
</div>

<footer class="mt-auto text-center bg-dark text-white py-2">
    &copy; Jonald Acosta 2024
</footer>

</body>
</html>
