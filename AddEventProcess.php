<?php
    include_once 'AdminSession.php'; // Include appropriate session file
    include_once 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and get event details from $_POST

        // Insert event into database
        $insertqry = mysqli_query($con, "INSERT INTO calendar_events (event_title, event_date, description) VALUES ('$event_title', '$event_date', '$description')") or die(mysqli_error($con));

        if ($insertqry) {
            echo "<script>alert('Event added successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
    }

    // Redirect or display a message as needed
?>