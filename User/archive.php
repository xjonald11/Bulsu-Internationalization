<?php
include_once '../connection.php';

if (isset($_GET['data'])) {
    $userId = $_GET['data'];

    // Perform the SQL query to update the user's status to archived (assuming 'status' is the field name)
    $archiveSql = "UPDATE user SET status = 1 WHERE id = $userId";
    $archiveResult = mysqli_query($con, $archiveSql);

    if ($archiveResult) {
        // Redirect back to the ViewUser.php or any appropriate page
        header("Location: ViewUser.php");
        exit();
    } else {
        echo "Failed to archive user. Please try again. Error: " . mysqli_error($con);
    }
} else {
    echo "Invalid request";
}
?>
