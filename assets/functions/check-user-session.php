<?php
    if(isset($_COOKIE['u_id']) && isset($_COOKIE['u_salt']) && isset($_COOKIE['u_xdf']) && isset($_COOKIE['u_name'])) 
    {
        
        $cookiesalt = $_COOKIE['u_salt'];
        $cookiepass = $_COOKIE['u_xdf'];
        $cookiename = $_COOKIE['u_name'];
        
        $sql = "SELECT * FROM member WHERE salt='$cookiesalt' AND password='$cookiepass' AND username='$cookiename'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return;
        }
        else
        {
            header("location: ../index.php");
            exit;
        }
    }
    if(isset($_SESSION['mem_id']) && isset($_COOKIE['u_id']) && isset($_COOKIE['u_xdf']) && isset($_COOKIE['u_name'])) 
    {
        $cookiepass = $_COOKIE['u_xdf'];
        $cookiename = $_COOKIE['u_name'];
        $cookieid = $_COOKIE['u_id'];
        
        $sql = "SELECT * FROM member WHERE mem_id='$cookieid' AND password='$cookiepass' AND username='$cookiename'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return;
        }
        else
        {
            header("location: ../index.php");
            exit;
        }
    }
    if(!isset($_SESSION['mem_id']) OR !isset($_COOKIE['u_id']) OR !isset($_COOKIE['u_xdf']) OR !isset($_COOKIE['u_name']))
    {
        header("location: ../index.php");
        exit;
    }

?>