<?php
include_once '../connection.php';
include_once 'StudentsSession.php';

$uname = $_SESSION['email'];
$password = $_SESSION['password'];
$chekUser = mysqli_query($con, "Select * from user where email= '$uname' AND password = '$password'") or die(mysqli_error($con));
$row = mysqli_fetch_array($chekUser);
$fname = $row['fname'];
$lname = $row['lname'];

$username = $fname . " " . $lname;

// Execute a query to fetch data
$result = mysqli_query($con, "SELECT * FROM file_requests WHERE student_email = '$uname'");

// Check if the query was successful
if (!$result) {
    die("Error fetching data: " . mysqli_error($con));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BULSU CMS - View Requests</title>
    <link rel="icon" href="../image/oia.png" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
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
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link"><?php echo $username ?></span>
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
                <h1>View Your Requests</h1>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Request ID</th>
                                <th>Student Name</th>
                                <th>Requested File</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['id']}</td>";
                                echo "<td>{$row['student_name']}</td>";
                                echo "<td>{$row['requested_file']}</td>";
                                echo "<td>{$row['status']}</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-auto text-center bg-dark text-white py-2">
        &copy; Jonald Acosta 2024
    </footer>

</body>

</html>