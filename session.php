<?php
    if(!isset($_SESSION)){
        session_start();
        $_SESSION['has_start'] = true;
    }
    if(!isset($_SESSION['token'])){
        $token = md5(uniqid(rand(),true));
        $_SESSION['token'] = $token;
    }   

?>