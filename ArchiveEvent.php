<?php
include_once 'connection.php';

if(isset($_GET['id'])) {
    $eventId = $_GET['id'];

    // Update the 'archived' status of the event to 1 (archived)
    $archiveQuery = "UPDATE calendar_events SET archived = 1 WHERE id = '$eventId'";
    $archiveResult = mysqli_query($con, $archiveQuery);

    if($archiveResult) {
        // Redirect back to the ViewEvents.php page after archiving
        header("Location: ViewEvents.php");
        exit();
    } else {
        // Handle the case where the query fails
        echo "Error archiving event: " . mysqli_error($con);
    }
} else {
    // Handle cases where 'id' is not set in the URL
    echo "Event ID not provided.";
}
?>
