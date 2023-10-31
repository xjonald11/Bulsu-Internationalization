<?php
include_once 'AdminSession.php'; // Include appropriate session file
include_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $event_title = mysqli_real_escape_string($con, $_POST['event_title']);
    $event_date = mysqli_real_escape_string($con, $_POST['event_date']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $updateqry = mysqli_query($con, "UPDATE calendar_events SET event_title='$event_title', event_date='$event_date', description='$description' WHERE id='$id'") or die(mysqli_error($con));

    if ($updateqry) {
        echo "<script>alert('Event updated successfully!'); window.location.href='ViewEvents.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
