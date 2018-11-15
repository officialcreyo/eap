<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once '../configs/mysql.php';
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

    $hashpassword = md5($password);

    $salt = "getTheFuckoutofmyWebsite1337";
    $date = date("d-F-Y");
    $saltstring = "$salt-$date-$username";
    $salt = sha1($saltstring);

    if(strcmp($_GET['login'], "partner") == 0) {

        $query = $conn->query("SELECT * FROM `sponsors` WHERE `username` = '$username' && `password` = '$hashpassword' OR `email` = '$username' && `password` = '$hashpassword' ");
        $row = $query->num_rows;
        $fetch = $query->fetch_array();
            if($row > 0){
                $_SESSION['sp_id'] = $fetch['sp_id'];
                $_SESSION['username'] = $fetch['username'];
                $sp_id = $_SESSION['sp_id'];

                if(!empty($_POST['remember'])){
                    setcookie("username", $_POST['username'], time()+(365 * 24 * 60 * 60), "/");
                    setcookie("password", $hashpassword, time()+(365 * 24 * 60 * 60), "/");
                    setcookie("salt", $salt, time()+(365 * 24 * 60 * 60), "/");

                }else{
                    if(ISSET($_COOKIE['username'])){
                        setcookie("username", "");
                    }
                    if(ISSET($_COOKIE['password'])){
                        setcookie("password", "");
                    }
                }
                header("Location: ../../app/partner.php?welcome=1");
                die();
            }else{
                header("Location: ../../index.php?login=partner&error=1");
            }
            $conn->close();

    }
    else
    {
        $query = $conn->query("SELECT * FROM `member` WHERE `username` = '$username' && `password` = '$hashpassword' OR `email` = '$username' && `password` = '$hashpassword' ");
        $row = $query->num_rows;
        $fetch = $query->fetch_array();
            if($row > 0)
            {
                $memlogin_id = $fetch['mem_id'];

                if(!empty($_POST['remember'])){
                    setcookie("u_name", $username, time()+(365 * 24 * 60 * 60), "/");
                    setcookie("u_xdf", $hashpassword, time()+(365 * 24 * 60 * 60), "/");
                    setcookie("u_id", $fetch['mem_id'], time()+(365 * 24 * 60 * 60), "/");
                    setcookie("u_salt", $salt, time()+(365 * 24 * 60 * 60), "/");

                    $sql = "UPDATE member SET salt='$salt' WHERE mem_id='$memlogin_id'";
                    $conn->query($sql);

                }
                else
                {
                    setcookie("u_name", $username, 0, "/");
                    setcookie("u_xdf", $hashpassword, 0, "/");
                    setcookie("u_id", $fetch['mem_id'], 0, "/");
                    $_SESSION['mem_id'] = $memlogin_id;
                }
                header("Location: ../../app/index.php?welcome=1");
                die();
            }else{
                header("Location: ../../index.php?error=1");
            }
            $conn->close();
    }
}
?>
