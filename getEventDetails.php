<?php
include_once 'connection.php';

if (isset($_POST['id'])) {
   $eventId = $_POST['id'];
   $query = "SELECT * FROM calendar_events WHERE id = $eventId";
   $result = mysqli_query($con, $query);

   if ($result && mysqli_num_rows($result) > 0) {
       $row = mysqli_fetch_assoc($result);
       echo "<h5>".$row['event_title']."</h5>";
       echo "<p>Date: ".$row['event_date']."</p>";
       echo "<p>Description: ".$row['description']."</p>";
   } else {
       echo "Event not found.";
   }
} else {
   echo "Invalid request.";
}
?>
