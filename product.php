<!DOCTYPE html>
<html>
<body>

<?php
session_start();

// initializing variables
$stud_id = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$db->close();   
        ?> 



</body>
</html>