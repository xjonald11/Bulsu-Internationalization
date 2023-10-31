<?php
    include_once 'HeadSession.php';
    include_once '../connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['approve'])) {
            $files = $_POST['files'];

            foreach($files as $fileId) {
                // Update the status of the file to 'Approved'
                mysqli_query($con, "UPDATE uploaded_files SET status = 'Approved' WHERE id = '$fileId'");
            }

            header('location: index.php'); // Redirect back to the ViewFiles page
            exit();
        }
        elseif(isset($_POST['pending'])) {
            $files = $_POST['files'];

            foreach($files as $fileId) {
                // Update the status of the file to 'Rejected'
                mysqli_query($con, "UPDATE uploaded_files SET status = 'Pending' WHERE id = '$fileId'");
            }

            header('location: index.php'); // Redirect back to the ViewFiles page
            exit();
        }
    }
?>
