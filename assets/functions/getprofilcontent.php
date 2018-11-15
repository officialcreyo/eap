<?php

$memcheck_id  = $_COOKIE['u_id'];
$memcheck_pass = $_COOKIE['u_xdf'];

$query = "SELECT * FROM member WHERE mem_id='$memcheck_id' AND password='$memcheck_pass'";
$result1 = mysqli_query($conn, $query);

if (mysqli_num_rows($result1) > 0) 
{
    $row1 = mysqli_fetch_assoc($result1);
    
    $mem_id = $memcheck_id;
    $mem_profilavatar = $row1['avatar'];
    $mem_firstname = $row1['firstname'];
    $mem_lastname = $row1['lastname'];
    $mem_nickname = $row1['nickname'];
    $mem_role = $row1['role'];
}
else
{
    header("location: ../index.php");
    exit;
}

?>