<?php
    if($_SERVER['REQUEST_METHOD']!='POST') header("location: index.php");
    require_once("connect.php");
    $Username = htmlentities($_POST["username"]);
    $Password = (htmlentities($_POST["password"]).$Username);
    $ConfirmPassword = (htmlentities($_POST["confirmpassword"].$Username));

    if($Password == $ConfirmPassword){
        $avery = password_hash($Password,PASSWORD_DEFAULT);
        $result = $con->prepare("INSERT INTO datalogin(username,password) VALUES(?,?)");
        $result->bind_param("ss",$Username,$avery);
        $result->execute();
            
    }
    else{
        header("location: register.php");
    }
    header("Location: index.php");

    $result->close();


?>