<?php
	session_start();
	session_unset($_SESSION['mem_id']);
    setcookie("u_name", "", - (10 * 365 * 24 * 60 * 60), "/");
    setcookie("u_id", "", - (10 * 365 * 24 * 60 * 60), "/");
    setcookie("u_salt", "", - (10 * 365 * 24 * 60 * 60), "/");
    setcookie("u_xdf", "", - (10 * 365 * 24 * 60 * 60), "/");

	header('location: /');
?>