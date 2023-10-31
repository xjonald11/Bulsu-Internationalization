<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doc_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<?php
    include_once 'HeadSession.php';
    $uname = $_SESSION['email'];
    $password = $_SESSION['password'];
    $chekUser = mysqli_query($con,"Select * from user where email= '$uname' AND password = '$password'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($chekUser);
    $fname = $row['fname'];
    $lname = $row['lname'];
    
    $username = $fname . " ".$lname;

if (isset($_POST['submit'])) {
    $file_name = $_FILES['file']['name'];
    $description = $_POST['description']; // Assuming you have an input field named 'description'
    $status = "Pending";
    $file_content = file_get_contents($_FILES['file']['tmp_name']);

    $stmt = $conn->prepare("INSERT INTO Headupload (file_name, description, status, file_content) VALUES (:file_name, :description, :status, :file_content)");
    $stmt->bindParam(':file_name', $file_name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':file_content', $file_content, PDO::PARAM_LOB);

    if ($stmt->execute()) {
        header("location:index.php"); // Redirect to desired page after successful upload
    } else {
        die(print_r($stmt->errorInfo(), true));
    }
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
                <li><a href="UploadFile.php">Add New file</a></li>
                        <li><a href="ViewFiles.php">View Files</a></li>
                        <li><a href="ViewUser.php">My Profile</a></li>
                </ul>
            </div>
            <div class="col-md-10">
            <div class="container">
    <br />
    <h1><p>Clerk Upload</p></h1>
    <br />
    <br />
    <form enctype="multipart/form-data" action="" name="form" method="post">
        <div class="form-group">
            <label for="file">Select File</label>
            <input type="file" class="form-control-file" name="file" id="file" />
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    </div>
    </div>
    </div>

    <footer class="mt-auto text-center bg-dark text-white py-2">
        &copy; Jonald Acosta 2023
    </footer>

</body>
</html>
