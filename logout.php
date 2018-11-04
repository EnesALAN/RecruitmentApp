<?php

session_start();
unset($_SESSION['name']);
// remove all session variables
 

// destroy the session 
session_destroy(); 

header("location:candidateloginpage.php");

?>