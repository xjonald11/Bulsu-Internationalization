<?php
    include_once 'StudentsSession.php';
    
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
  <!--  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
        <link rel="stylesheet" href="../css/index.css">
        <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../js/Registration.js"></script>
        <script>
            function getPage(url){
                $('#content').hide(500,function(){
                $('#content').load(url);
                $('#content').show(500,function(){});
                });
            }
        </script>
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
    <script>
        function getPage(url){
            $('#content').hide(500,function(){
            $('#content').load(url);
            $('#content').show(500,function(){});
            });
        }
    </script>
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
                    <h1>Welcome to BULSU Internationalizations</h1>
                    <ul>
                        <li>Add new user</li>
                        <li>Edit registered users</li>
                    </ul>s
                </div>
            </div>


        </div>
    </div>

    <footer class="mt-auto text-center bg-dark text-white py-2">
        &copy; Jonald Acosta 2024
    </footer>

</body>
</html>