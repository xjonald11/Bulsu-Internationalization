<?php
$servername = "localhost"; // Your MySQL server name
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "doc_db"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are present
    if(isset($_POST['email'], $_POST['otp'], $_POST['newPassword'])) {
        $email = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['email'])));
        $otp = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['otp'])));
        $newPassword = htmlentities(stripslashes(mysqli_real_escape_string($conn, $_POST['newPassword'])));

        // Hash the new password using MD5 (or use a stronger hashing algorithm)
        $hashedPassword = md5($newPassword);

        // Prepare SQL statement to fetch the stored hashed OTP for the user
        $sqlFetchOTP = "SELECT otp_field FROM user WHERE email = ?";
        $stmtFetchOTP = $conn->prepare($sqlFetchOTP);

        // Check if the prepare statement was successful
        if ($stmtFetchOTP) {
            $stmtFetchOTP->bind_param("s", $email);
            $stmtFetchOTP->execute();
            $resultFetchOTP = $stmtFetchOTP->get_result();

            // Check if the query was executed successfully
            if ($resultFetchOTP) {
                // Check if the email exists
                if ($resultFetchOTP->num_rows === 1) {
                    $row = $resultFetchOTP->fetch_assoc();
                    $storedOTP = $row['otp_field'];

                    // Compare the received OTP with the stored OTP
                    if ($otp === $storedOTP) {
                        // Hash the new password using MD5
                        $hashedPassword = md5($newPassword);

                        // Update the new password for the user
                        $sqlUpdatePassword = "UPDATE user SET password = ? WHERE email = ?";
                        $stmtUpdatePassword = $conn->prepare($sqlUpdatePassword);

                        if ($stmtUpdatePassword) {
                            $stmtUpdatePassword->bind_param("ss", $hashedPassword, $email);
                            $stmtUpdatePassword->execute();

                            // Inform the user that the password has been reset successfully
                            echo "Password has been reset successfully.";

                            // Redirect to the login page after resetting the password
                            header("Location: login.php");
                            exit();
                        } else {
                            echo "Error updating password: " . $conn->error;
                        }
                    } else {
                        echo "Invalid OTP.";
                    }
                } else {
                    echo "No user found for the given email.";
                }
            } else {
                echo "Error executing query: " . $stmtFetchOTP->error;
            }
            $stmtFetchOTP->close();
        } else {
            echo "Error in SQL prepare statement: " . $conn->error;
        }
    } else {
        echo "Incomplete data received.";
    }
}

// Close database connection at the end
$conn->close();
?>
