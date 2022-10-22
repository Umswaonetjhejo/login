<?php
//Developer: Jonathan Musa Skosana
//https://www.linkedin.com/in/jonathan-musa-skosana-a31a26a1/

session_start();
unset($_SESSION['username']);
session_destroy();
header("Location: index.php");
?>