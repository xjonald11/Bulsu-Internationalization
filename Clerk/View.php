<?php
    include_once 'ClerkSession.php';
    include_once '../connection.php';

    // Retrieve uploaded files
    $result = mysqli_query($con, "SELECT * FROM uploaded_files") or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BULSU CMS</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">View Uploaded Files</h2>
                <?php
                // Check if there are any uploaded files
                if (mysqli_num_rows($result) > 0) {
                    // Display the Bootstrap table
                    echo "<div class='table-responsive'>
                            <table class='table table-bordered'>
                                <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>";

                    // Output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['file_name']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['status']}</td>
                            </tr>";
                    }

                    echo "</tbody></table></div>";
                } else {
                    echo "No uploaded files yet.";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  -->
</body>
</html>
