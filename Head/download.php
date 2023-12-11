<?php
$file = $_GET['filename'];

// Check if the file exists
if(file_exists($file)) {
    // Set the appropriate content type
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Length: ' . filesize($file));

    // Read the file and send the contents
    readfile($file);
} else {
    echo 'File not found.';
}
?>
