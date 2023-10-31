<?php
    include_once '../connection.php';
    $id = $_REQUEST['data'];
    $qry = mysqli_query($con,"Select * from user where id='$id'") or die(mysqli_error($con));
    while($row = mysqli_fetch_array($qry)){
        $id = $row['id'];
        $fname=$row['fname'];
        $lname =$row['lname'];
        $phone = $row['phone'];
        $email = $row['email'];
    }
?>
<?php
    include_once '../AdminSession.php';
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
        <img src="../image/oia.png" alt="Logo" height="50">
        BULSU Internationalization
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
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
                <li><a href="Registration.php">Add user</a></li>
                    <li><a href="ViewUser.php">View Users</a></li>
                    <li><a href="../AddEvent.php">Add Events</a></li>
                    <li><a href="../ViewEvents.php">View Events</a></li>
                    <li><a href="../AddPartner.php">Add partners</a></li>
                </ul>
            </div>
            <div class="col-md-10">

    <div class="container mt-5">
        <h2 class="text-center">Edit User Form</h2>
        <form name="Myform" id="Myform" action="User/EditProcess.php?id='<?php echo $id;?>'" method="post" onsubmit="return(Validate());">
            <div id="error" class="text-danger font-weight-bold mb-3"></div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" onkeydown="HideError()" value="<?php echo $fname?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" onkeydown="HideError()" value="<?php echo $lname?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Phone Number</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" onkeydown="HideError()" value="<?php echo $phone?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" onkeydown="HideError()" value="<?php echo $email?>" required>
                    </div>
                    <div class="form-group">
                        <label for="usertype">User Type</label>
                        <select class="form-control" id="usertype" name="usertype" onkeydown="HideError()" required>
                            <option value="user" selected>Select User type</option>
                            <option value="Admin">Admin</option>
                            <option value="Normal">Director</option>
                            <option value="Head">Head</option>
                            <option value="Clerk">Clerk</option>
                            <option value="Students">Students</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
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