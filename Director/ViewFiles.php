<?php
      include_once 'DirectorSession.php';
      $uname = $_SESSION['email'];
      $password = $_SESSION['password'];
      $chekUser = mysqli_query($con,"Select * from user where email= '$uname' AND password = '$password'") or die(mysqli_error($con));
      $row = mysqli_fetch_array($chekUser);
      $fname = $row['fname'];
      $lname = $row['lname'];
      
      $username = $fname . " ".$lname;
    include_once '../connection.php';

    $result = mysqli_query($con, "SELECT * FROM Headupload");
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
                <li><a href="UploadFile.php">Add New file</a></li>
                        <li><a href="ViewFiles.php">View Files</a></li>
                        <li><a href="ViewUser.php">My Profile</a></li>
                </ul>
            </div>
            <div class="col-md-10">
    <div class="container mt-5">
        <h2 class="text-center mb-4">View Files</h2>
        <form action="UpdateStatus.php" method="post">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>File Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$row['file_name']."</td>";
                                echo "<td>".$row['description']."</td>";
                                echo "<td>".$row['status']."</td>";
                                echo "<td><input type='checkbox' name='files[]' value='".$row['id']."'></td>";
                                echo "<td><a href='download.php?filename=".$row['file_name']."'>Download</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success" name="approve" value="Approve">
                <input type="submit" class="btn btn-danger" name="pending" value="Pending">
            </div>
        </form>
    </div>

    </div>
    </div>

    <footer class="mt-auto text-center bg-dark text-white py-2">
        &copy; Jonald Acosta 2023
    </footer>

</body>
</html>