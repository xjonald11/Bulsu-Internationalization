<?php
$file = $_GET['filename'];

// Check if the file exists
if(file_exists($file)) {
    // Set the appropriate content type
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Length: ' . filesize($file));

<<<<<<< HEAD
    // Read the file and send the contents
    readfile($file);
=======
function output_file($file, $name, $mime_type='')
{
if(!is_readable($file)) die('File not found!');

$size = filesize($file);
$name = rawurldecode($name);
$known_mime_types=array(
"pdf" => "application/pdf",
"txt" => "text/plain",
"html" => "text/html",
"htm" => "text/html",
"exe" => "application/octet-stream",
"zip" => "application/zip",
"doc" => "application/msword",
"docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
"xls" => "application/vnd.ms-excel",
"ppt" => "application/vnd.ms-powerpoint",
"gif" => "image/gif",
"png" => "image/png",
"jpeg"=> "image/jpg",
"jpg" => "image/jpg",
"php" => "text/plain"
);
if($mime_type==''){
$file_extension = strtolower(substr(strrchr($file,"."),1));
if(array_key_exists($file_extension, $known_mime_types)){
$mime_type=$known_mime_types[$file_extension];
>>>>>>> 1ec2bc4f06da13707b7d787594a81a18266b0e31
} else {
    echo 'File not found.';
}
<<<<<<< HEAD
=======
$new_length = $range_end-$range+1;
header("HTTP/1.1 206 Partial Content");
header("Content-Length: $new_length");
header("Content-Range: bytes $range-$range_end/$size");
} else {
$new_length=$size;
header("Content-Length: ".$size);
}
$chunksize = 1*(1024*1024);
$bytes_send = 0;
if ($file = fopen($file, 'r'))
{
if(isset($_SERVER['HTTP_RANGE']))
fseek($file, $range);

while(!feof($file) &&
(!connection_aborted()) &&
($bytes_send<$new_length)
)
{
$buffer = fread($file, $chunksize);
print($buffer);
flush();
$bytes_send += strlen($buffer);
}
fclose($file);
} else

die('Error - cannot open file.');
die();
}
set_time_limit(0);
$file_path='../uploads/'.$_REQUEST['filename'];
output_file($file_path, ''.$_REQUEST['filename'].'', 'text/plain');
>>>>>>> 1ec2bc4f06da13707b7d787594a81a18266b0e31
?>
