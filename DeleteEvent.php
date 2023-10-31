<?php
include_once 'AdminSession.php'; // Include appropriate session file
include_once 'connection.php';

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $result = mysqli_query($con, "SELECT * FROM calendar_events WHERE id='$id'");

    if(mysqli_num_rows($result) == 1) {
        $deleteqry = mysqli_query($con, "DELETE FROM calendar_events WHERE id='$id'");
        if($deleteqry) {
            echo "<script>alert('Event deleted successfully!'); window.location.href='ViewEvents.php';</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Event not found.";
    }
} else {
    echo "Invalid request.";
}
?>
