<?php
if($_SERVER['REQUEST_METHOD']!='POST') header("location: index.php");
session_start();
session_unset();
header("Location: index.php");

?>