<?php
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
    $email = $_POST['email'];

    // Check if the email exists in the database
    $check_stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
    if ($check_stmt) {
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            // Email exists in the database, proceed with OTP generation and email sending

            // Generate OTP as plain text
            $otp = generateOTP();

            // Update OTP in the database (consider encryption instead of hashing)
            $update_stmt = $conn->prepare("UPDATE user SET otp_field = ? WHERE email = ?");
            if ($update_stmt) {
                $update_stmt->bind_param("ss", $otp, $email);
                if ($update_stmt->execute()) {
                    // Send OTP via email
                    $mail = new PHPMailer(true);

                    try {
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'bulsuinternationalization@gmail.com';
                        $mail->Password = 'glrpxihnunbbjpcf'; // SecurityKeyPassword
                        $mail->Port = 587; // Use port 587 for TLS
                        $mail->SMTPSecure = 'tls'; // Change to 'ssl' if using port 465 for SSL

                        $mail->setFrom('bulsuinternationalization@gmail.com', 'Bulsu Internationalization');
                        $mail->addAddress($email);

                        $mail->Subject = 'Password Reset Request';
                        $imagePath = '../image/int2.jpg'; // Replace this with the path to your image
                        $imageCID = 'logo'; // Unique Content ID for the image
                        
                        $mail->Subject = 'Password Reset Request';
                        $mail->Body = "
                            <html>
                            <body>
                            
                                <p>Dear User,</p>
                                <p>We have received your request for a password reset.</p>
                                <p>Your OTP for password reset is: $otp.</p>
                                <p>Please enter your new password <a href='https://cmbulsu.slarenasitsolutions.com/Login/login.php'>Here</a>.</p>
                                <p>If you did not initiate this password reset, please contact us.</p>
                                <p>Thank you very much.</p>
                                <p>Regards,<br/>Bulacan State University</p>
                                <p><em>Note: If you have received a previous reset password email, please disregard the mail. A new token was generated for every password request; therefore, it is useless to use the verification code prior to this mail. Thank you.</em></p>
                                <img src='cid:$imageCID' alt='Logo'>
                            </body>
                            </html>
                        ";
                        
                        // Embed the image into the email body
                        $mail->addEmbeddedImage($imagePath, $imageCID);
                        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
                        $mail->isHTML(true);

                        $mail->send();
                   // Redirect to reset_password.php after sending OTP
                   header('Location: reset_password.php');
                   exit; // Ensure no further execution after redirection
               } catch (Exception $e) {
                   echo "Mailer Error: " . $mail->ErrorInfo;
               }
           } else {
               echo "Error executing SQL query: " . $update_stmt->error;
           }
           $update_stmt->close();
       } else {
           echo "Error in SQL prepare statement: " . $conn->error;
       }
   } else {
       echo "Email not found in the database. Cannot send the OTP.";
   }

   $check_stmt->close();
} else {
   echo "Error in SQL prepare statement: " . $conn->error;
}

// Close the database connection
$conn->close();
}

// Function to generate OTP (replace with a more secure method)
function generateOTP()
{
$otp = rand(100000, 999999); // Plain text OTP
return $otp;
}
?>
