<?php
    if(isset($_COOKIE['u_salt']) && isset($_COOKIE['u_id']) && isset($_COOKIE['u_xdf']) && isset($_COOKIE['u_name'])) {
        
        $cookiesalt = $_COOKIE['u_salt'];
        $cookiepass = $_COOKIE['u_xdf'];
        $cookiename = $_COOKIE['u_name'];
        $cookieid = $_COOKIE['u_id'];
        
        
        $sql = "SELECT * FROM member WHERE salt='$cookiesalt' AND password='$cookiepass' AND username='$cookiename' AND mem_id='$cookieid'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("location: /app/index.php");
        }
        else
        {
            echo "<br><div class='container alert alert-danger' role='alert'>Autologin has been disabled due secruity violations.</div>";
            return;
        }
    }
    if(isset($_SESSION['mem_id'])) {
        header("location: /app/index.php");
    }
?>