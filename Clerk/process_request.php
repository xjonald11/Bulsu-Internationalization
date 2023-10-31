<?php
include_once '../connection.php';
include_once 'ClerkSession.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $request_id = htmlspecialchars(trim($_POST["request_id"]));

    // Check which button was clicked
    if (isset($_POST['approve'])) {
        $status = 'Approved';
    } elseif (isset($_POST['pending'])) {
        $status = 'Pending';
    } else {
        die("Invalid request");
    }

    // Update the status in the database
    $stmt = $con->prepare("UPDATE file_requests SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $request_id);

    if ($stmt->execute()) {
        $stmt->close();
        $con->close();
        header("Location: index.php"); // Redirect to index.php
        exit();
    } else {
        echo "Error updating status: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
} else {
    echo "Invalid request";
}
?>
