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
                <div class="text-insert">Tìm kiếm nhân viên:</div>
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
                <div class="list-of-nv">
                    <?php
                    if(isset($_SESSION['list'])){?> 
                        <table class="list-staff">
                            <tr>
                                <td>
                                    <table>
                                    <th>ID</th>
                                    <th>Họ và tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Chức vụ</th>
                                    <th>Chỉnh sửa</th>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="scroll-table">  <table >
                                <?php
                                foreach($_SESSION['list'] as $staff){
                                    echo '<tr>' . '<td>' .
                                        $staff['ID'] . '</td><td>' . 
                                        $staff['name'] . '</td><td>' . 
                                        $staff['dateOfBorn'] . '</td><td>' . 
                                        $staff['position'] . '</td>'; ?>
                                        <td><a href="">chỉnh sửa</a> </td> </tr>
                                        <?php
                                }?>
                                    </table>    </div>
                                </td>
                            </tr>
                        </table>
                        <?php
                        unset($_SESSION['list']);
                    }else{
                        $rdb = new firebaseRDB($databaseURL);
                        $retrive = $rdb->retrieve("/staffManager");
                        $data = json_decode($retrive, 1);
                        if($data == ""){ ?>
                            <table class="list-staff">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ và tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Chức vụ</th>
                                    <th>Chỉnh sửa</th>
                                </tr>
                            </thead>
                            </table>
                        <?php }else{
                        ?> 
                        <table class="list-staff">
                            <tr>
                                <td>
                                    <table>
                                    <th>ID</th>
                                    <th>Họ và tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Chức vụ</th>
                                    <th>Chỉnh sửa</th>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="scroll-table">  <table >
                                <?php
                                foreach($data as $staff){
                                    echo '<tr>' . '<td>' .
                                        $staff['ID'] . '</td><td>' . 
                                        $staff['name'] . '</td><td>' . 
                                        $staff['dateOfBorn'] . '</td><td>' . 
                                        $staff['position'] . '</td>'; ?>
                                        <td><a href="">chỉnh sửa</a> </td> </tr>
                                        <?php
                                }?>
                                    </table>    </div>
                                </td>
                            </tr>
                        </table>
                        <?php
                        }
                    }
                    ?>
                </div>
                <?php
                        if(isset($_GET['in4'])){ ?>
                      
                            <div id="in4-insert"><?php echo $_GET['in4']; ?></div>
               
                <?php } ?>
                <script>
                    setTimeout(() => {
                        let info = document.getElementById("in4-insert");
                        // info.innerHTML="snv";
                        info.className = "show";
                    }, 2000);
                </script>
                <!-- insert -->
                <div class="insert-box">
                    <div class="text-insert">Thêm nhân viên</div>
                    
                    <form class="insert-form" action="insert_staff_action.php" method="post">
                        <div>ID:</div>
                        <input class="search-ID" type="text" name="ID">
                        <div>Họ và tên:</div>
                        <input class="search-name" type="text" name="namestaff">
                        <div>Ngày sinh:</div>
                        <input class="search-born" type="date" name="dateofborn">
                        <div>Chức vụ:</div>
                        <select class="position-staff" name="positionstaff">
                            <option value="Viện Trưởng">Viện trưởng</option>
                            <option value="Trưởng phòng">Trưởng phòng</option>
                            <option value="Phó phòng">Phó phòng</option>
                            <option value="Bác sĩ">Bác sĩ</option>
                            <option value="Y tá">Y tá</option>
                        </select>
                        <input class="search-button" type="submit" value="Thêm">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>