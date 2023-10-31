<?php
@session_start();
include_once '../connection.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id']; // Assuming you have a 'user_id' stored in the session
    $uploadDir = '../uploads/'; // Directory where uploaded files will be stored

    // Check if the directory exists, if not, create it
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = $_FILES['file']['name'];
    $tempName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];

    $targetFilePath = $uploadDir . basename($fileName);

    // Check if file already exists
    if (file_exists($targetFilePath)) {
        echo "Sorry, file already exists.";
    } else {
        // Upload the file
        if (move_uploaded_file($tempName, $targetFilePath)) {
            // Insert information about the uploaded file into the database
            $insertQuery = "INSERT INTO uploaded_files (user_id, file_name, file_path, file_type, file_size) 
                            VALUES ('$user_id', '$fileName', '$targetFilePath', '$fileType', '$fileSize')";
            mysqli_query($con, $insertQuery) or die(mysqli_error($con));

            echo "The file " . htmlspecialchars(basename($fileName)) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Upload File</h2>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fileToUpload">Select File to Upload:</label>
                        <input type="file" class="form-control-file" name="file" id="fileToUpload">
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Upload File" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

