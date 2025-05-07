<?php
//if(isset($_REQUEST["file"])){
    // Get parameters
    $file = urldecode($_REQUEST["qt"]); // Decode URL-encoded string
$id=$_REQUEST['qt'].".pdf";
    /* Test whether the file name contains illegal characters
    such as "../" using the regular expression */
    if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){
        $filepath = $file;

        // Process download
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
           
  unlink($filepath);
    print "<script>";
	print "self.location='tgqot_list.php';";
	print "</script>";
            die();
            
           // unlink($filepath);
          //  print "<script>";
	//print "self.location='tgqot_list.php';";
	//print "</script>";
            
        } else {
            http_response_code(404);
	        die();
        }
    } else {
        die("Invalid file name!");
    }
//}
?>