<?php
include("config.php");
include("firebaseRDB.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bệnh viên ABC | Quản lý nhân viên y tế</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/staff-mag.css">
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
                    <a  href="main-web.php">Trang chủ</a>
                </li>
                <li>
                    <a class="main-page" href="staff-mag.php">Quản lý nhân viên y tế</a>
                </li>
                <li>
                    <a href="patient-manager.php">Quản lý bệnh nhân</a>
                </li>
                <li>
                    <a href="">Quản lý thuốc và thiết bị y tế</a>
                </li>
            </ul>
        </div>
        <div class ="qlnv">
            <div class="name-table">Quản lý nhân viên y tế</div>
            <div>
                <form class="search-form" action="staff_mag_action.php" method="post">
                    <div>ID:</div>
                    <input class="search-ID" type="text" name="IDStaff">
                    <div>Họ và tên:</div>
                    <input class="search-name" type="text" name="nameStaff">
                    <div>Ngày sinh:</div>
                    <input class="search-born" type="date" name="dateOfBorn" placeholder="dd-mm-yyyy">
                    <div>Chức vụ:</div>
                    <select class="position-staff" name="positionStaff">
                        <option value="">Không</option>
                        <option value="resident">Viện trưởng</option>
                        <option value="">Trưởng khoa</option>
                        <option value="">Phó khoa</option>
                        <option value="">Bác sĩ</option>
                        <option value="">Y tá</option>
                    </select>
                    <input class="search-button" type="submit" value="Tìm kiếm">
                </form>
            </div>
            <div class="list-box">
                <!-- list -->
                <div class="">
                    <?php
                    if(isset($_SESSION['list'])){
                        echo '<ul>';
                        foreach($_SESSION['list'] as $staff){
                            echo '<li>' . 
                                $staff['ID'] . ' - ' . 
                                $staff['name'] . ' - ' . 
                                $staff['dateOfBorn'] . ' - ' . 
                                $staff['position'] . 
                            '</li>';
                        }
                        echo '</ul>';
                        unset($_SESSION['list']);
                    }
                    ?>
                </div>

                <!-- insert -->
                <div>
                    <form action="insert_staff_action.php" method="post">
                        <?php
                            if(isset($_GET['in4'])){ ?>
                                <div><?php echo $_GET['in4']; ?></div>
                        <?php } ?>
                        <input type="text" name="ID">
                        <input type="text" name="namestaff">
                        <input type="date" name="dateofborn">
                        <select name="positionstaff">
                            <option value="chutich">Chủ tịch</option>
                            <option value="truongphong">Trưởng phòng</option>
                            <option value="phophong">Phó phòng</option>
                            <option value="bacsi">Bác sĩ</option>
                            <option value="yta">Y tá</option>
                        </select>
                        <input type="submit" value="Thêm">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>