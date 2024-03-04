<?php
include("config.php");
include("firebaseRDB.php");
if(!isset($_SESSION['user'])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bệnh viên ABC | Trang chủ</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/main-web.css">
        <link rel="shortcut icon" href="./images/logo.png">
    </head>

    <body>
        <div class="header-1">
            <div class="begin-header-1">
                <div class="logo">
                    <img class="logo-img" src="./images/logo.png" alt="none">
                </div>
                <div class="Name-text">
                    Quản lí bệnh viện(need text decoration)
                </div>
            </div>
            <div class="end-header-1">
                <div>Xin chào, <b><?php echo $_SESSION['user']['name'] ?></b> (<a class="logout-header-1" href='logout.php'>Thoát</a>)</div>
            </div>
        </div>
        <div class="obj-2">
            <ul class="list-option-obj-2">
                <li >
                    <a class="main-page" href="main-web.php">Trang chủ</a>
                </li>
                <li>
                    <a href="staff-mag.php">Quản lý nhân viên y tế</a>
                </li>
                <li>
                    <a href="vic-mag.php">Quản lý bệnh nhân</a>
                </li>
                <li>
                    <a href="">Quản lý thuốc và thiết bị y tế</a>
                </li>
            </ul>
        </div>
        <div class="main-background-website">
            <!-- <div class="name-inpic">Bệnh viện ABC</div> -->
        </div>
    </body>
</html>