<?php
include_once 'connection.php';

if(isset($_GET['id'])) {
    $eventId = $_GET['id'];

    // Update the 'archived' status of the event to 0 (unarchived)
    $unarchiveQuery = "UPDATE calendar_events SET archived = 0 WHERE id = '$eventId'";
    $unarchiveResult = mysqli_query($con, $unarchiveQuery);

    if($unarchiveResult) {
        // Redirect back to the ViewEvents.php page after unarchiving
        header("Location: ViewEvents.php");
        exit();
    } else {
        // Handle the case where the query fails
        echo "Error unarchiving event: " . mysqli_error($con);
    }
} else {
    // Handle cases where 'id' is not set in the URL
    echo "Event ID not provided.";
}
?>
