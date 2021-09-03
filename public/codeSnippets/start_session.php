<?php 
// Initialize the session
session_start();

// echo "Session info";
var_dump(session_status());
var_dump($_SESSION);
var_dump(session_save_path());


?>