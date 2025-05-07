<?php
/*error_reporting(0);
define('DB_NAME', 'accentel_jfm');
define('DB_USER', 'accentel_jfm');
define('DB_PASSWORD', 'Jfm@35791$');
define('DB_HOST', 'localhost');
 
// Create connection
$db     =   new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}*/


error_reporting(0);
define('DB_NAME', 'actlhhvu_kvrbilling');
define('DB_USER', 'actlhhvu_kvrbilling');
define('DB_PASSWORD','kvrbilling@123$#');
define('DB_HOST', 'localhost');
 
// Create connection
$db     =   new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>