<?php
include_once 'connection.php';
include_once 'AdminSession.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profileImage'])) {
    $uname = $_SESSION['email'];

    $targetDir = "uploads/";
    $fileName = basename($_FILES['profileImage']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if the file is an image
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to the server
        if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFilePath)) {
            // Update image file path in the user table
            $updateQuery = mysqli_query($con, "UPDATE user SET profile_image = '$targetFilePath' WHERE email = '$uname'");

            if ($updateQuery) {
                // File uploaded successfully, redirect back
                header("Location: ViewPartnerProfiles.php");
                exit(); // Ensure that subsequent code doesn't execute after redirection
            } else {
                echo "File upload failed, please try again.";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
}
?>
