<?php
    include_once 'AdminSession.php';
    include_once 'connection.php';

    // Check if the user is logged in
    $uname = $_SESSION['email'];
    $password = $_SESSION['password'];
    $chekUser = mysqli_query($con,"Select * from user where email= '$uname' AND password = '$password'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($chekUser);
    $fname = $row['fname'];
    $lname = $row['lname'];
    
    $username = $fname . " ".$lname;
    ?>  
    <?php
// ...

$latestEventResult = mysqli_query($con, "SELECT * FROM calendar_events ORDER BY event_date DESC LIMIT 1");

// Check if there are any results
if ($latestEventResult && mysqli_num_rows($latestEventResult) > 0) {
    $latestEvent = mysqli_fetch_assoc($latestEventResult);
    $latestEventTitle = $latestEvent['event_title'];
    $latestEventDate = $latestEvent['event_date'];
    $latestEventDescription = $latestEvent['description'];
} else {
    $latestEventTitle = "No events found";
    $latestEventDate = "";
    $latestEventDescription = "";
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
            <img src="image/oia.png" alt="Logo" height="50">
            BULSU Internationalization
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a href="Gallery.php" class="nav-link">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
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
                    <!-- Add your content here -->
                </div>
            </div>
        </div>
        <div class="row flex-grow-1">
            <div class="col-md-2 bg-light">
                <ul class="list-unstyled">
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                    <li><a href="User/Registration.php">Add user</a></li>
                    <li><a href="User/ViewUser.php">View Users</a></li>
                    <li><a href="AddEvent.php">Add Events</a></li>
                    <li><a href="ViewEvents.php">View Events</a></li>
                    <li><a href="AddPartner.php">Add partners</a></li>
                </ul>
            </div>

            <div class="col-md-10">
                <div id="content">
                    <h1>Welcome to BULSU Internationalization</h1>
                    <ul>
                        <li>Add new user</li>
                        <li>Edit Users</li>
                        <li>view Users</li>
                        <li>View, Edit, Delete Events</li>
                        <li>Add Partners Company</li>
                    </ul>

                    <!-- Display the latest event -->
                    <h2>Latest Event</h2>
                    <h3><?php echo $latestEventTitle; ?></h3>
                    <p>Date: <?php echo $latestEventDate; ?></p>
                    <p>Description: <?php echo $latestEventDescription; ?></p>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-auto text-center bg-dark text-white py-2">
        &copy; Jonald Acosta 2023
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/Registration.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

</body>

</html>
