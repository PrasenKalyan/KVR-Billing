<?php
include 'dbconnection/connection.php';
if (isset($_GET['file'])) {
    $filename = urldecode($_GET['file']); 
    $filepath = "upload/" . $filename;

    if (file_exists($filepath)) {
        // Set headers to force download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' .basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "No file specified to download.";
}
