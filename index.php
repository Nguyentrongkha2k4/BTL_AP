<?php
include("config.php");

header("location: login.php");

// if(!isset($_SESSION['user'])){
//     header("location: login.php");
// }else if($_SESSION['user']['role'] == 'admin'){
//     header("location: admin-web.php");
// }else if($_SESSION['user']['role'] == 'staff'){
//     header("location: staff-web.php");
// }else{
//     header("location: login.php");
// }