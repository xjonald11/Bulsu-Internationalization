<?php
include_once 'connection.php';

$result = mysqli_query($con, "SELECT * FROM calendar_events");
?>
<?php
    include_once 'AdminSession.php';
    $uname = $_SESSION['email'];
    $password = $_SESSION['password'];
    $chekUser = mysqli_query($con,"Select * from user where email= '$uname' AND password = '$password'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($chekUser);
    $fname = $row['fname'];
    $lname = $row['lname'];
    
    $username = $fname . " ".$lname;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BULSU CMS</title>
    <link rel="icon" href="../image/oia.png" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/Registration.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
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
 <!--   <script>
        function getPage(url){
            $('#content').hide(1000,function(){
            $('#content').load(url);
            $('#content').show(1000,function(){});
            });
        }
    </script>  -->
</head>
<body class="d-flex flex-column h-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="image/oia.png" alt="Logo" height="50">
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
                    <span class="nav-link"><?php echo $username?></span>
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
                <li><a href=""></a></li>
                <li><a href="User/Registration.php">Add user</a></li>
                    <li><a href="User/ViewUser.php">View Users</a></li>
                    <li><a href="AddEvent.php">Add Events</a></li>
                    <li><a href="ViewEvents.php">View Events</a></li>
                    <li><a href="AddPartner.php">Add partners</a></li>
                </ul>
            </div>
            <div class="col-md-10">
<?php

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $result = mysqli_query($con, "SELECT * FROM calendar_events WHERE id='$id'");

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Display an edit form with fields pre-populated with event details
        echo "<form action='EditEventProcess.php' method='post'>";
        echo "<input type='hidden' name='id' value='".$row['id']."'>";
        echo "<div class='form-group'>
                <label for='event_title'>Event Title</label>
                <input type='text' class='form-control' name='event_title' value='".$row['event_title']."' required>
              </div>";
        echo "<div class='form-group'>
                <label for='event_date'>Event Date</label>
                <input type='date' class='form-control' name='event_date' value='".$row['event_date']."' required>
              </div>";
        echo "<div class='form-group'>
                <label for='description'>Description</label>
                <textarea class='form-control' name='description' rows='3' required>".$row['description']."</textarea>
              </div>";
        echo "<input type='submit' class='btn btn-primary' name='submit' value='Save Changes'>";
        echo "</form>";
    } else {
        echo "Event not found.";
    }
} else {
    echo "Invalid request.";
}
?>
</div>
    </div>

    <footer class="mt-auto text-center bg-dark text-white py-2">
        &copy; Jonald Acosta 2023
    </footer>

</body>
</html>