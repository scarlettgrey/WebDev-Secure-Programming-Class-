<?php
    require_once("connect.php");
    require_once("session.php");
    if(isset($_POST['token']) == $_SESSION['token']){
        $stmtlogin = $con->prepare("SELECT password FROM datalogin WHERE username = ?");
        if(isset($_POST['username'])){
            $Username = htmlentities($_POST["username"]);
            $stmtlogin->bind_param("s",$Username);
            $stmtlogin->execute();
            $stmtlogin->bind_result($Password);
            $stmtlogin->fetch();
            $varygtersortir = htmlentities($_POST["password"]);
            if(password_verify($varygtersortir.$Username,$Password)){
                $_SESSION['Username'] = $Username;
                session_regenerate_id($_SESSION['token']);
                header("Location: index.php");
            }
            else{
                echo "Your Username or Password Seems Invalid";
            }
        }
    }
    else{
        echo "Hayo mau csrf ya ? muehehehe -Juan2k19";
        session_unset();
    }
?>