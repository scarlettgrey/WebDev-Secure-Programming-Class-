<?php
if(!function_exists('url')){
    function url($targ){
        if($targ[0] != '/') $targ = "/$targ";
        return sprintf("%s://%s:%s%s",isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',$_SERVER['S_NAME'],$_SERVER['S_PORT'],$targ);
    }
}
if(!function_exists('redir')){
    function redir($targ){
        $targ=url($targ);
        header("Location: $targ");
        die();
    }
}
if(!function_exists('add_err')){
    function add_err($error){$_SESSION['error'] = $error;}
}
if(!function_exists('has_err')){
    function has_err(){return (isset($_SESSION['error']));}
}
if(!function_exists('get_err')){
    function get_err(){
        $err = $_SESSION['error'];
        unset($_SESSION['error']);
        return $err;
    }
}
?>
