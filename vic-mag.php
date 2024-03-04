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
        <link rel="stylesheet" href="./css/vic-mag.css">
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
                    <a href="staff-mag.php">Quản lý nhân viên y tế</a>
                </li>
                <li>
                    <a class="main-page" href="vic-mag.php">Quản lý bệnh nhân</a>
                </li>
                <li>
                    <a href="">Quản lý thuốc và thiết bị y tế</a>
                </li>
            </ul>
        </div>
        <div class ="qlnv">
            <div class="name-table">QUẢN LÝ BỆNH NHÂN</div>
            <div>
                <div class="text-insert">Tìm kiếm bệnh nhân:</div>
                <form class="search-form" action="vic_mag_action.php" method="post">
                    <div>CCCD:</div>
                    <input class="search-ID"type="text" name="CCCDVic">
                    <div>Họ và tên:</div>
                    <input class="search-name" type="text" name="nameVic">
                    <div>Ngày sinh:</div>
                    <input class="search-born" type="date" name="dateOfBorn" placeholder="dd-mm-yyyy">
                    <div>Khoa điều trị:</div>
                    <select class="position-vic" name="positionVic">
                        <option value="">Không</option>
                        <option value="">Khoa Ngoại tổng hợp</option>
                        <option value="">Khoa Nội tổng hợp</option>
                        <option value="">Khoa Thần kinh</option>
                        <option value="">Khoa Nhi</option>
                        <option value="">Khoa Mắt</option>
                    </select>
                    <input class="search-button" type="submit" value="Tìm kiếm">
                </form>
            </div>
            <div class="list-box">
                <!-- list -->
                <div class="list-of-nv"><?php
                    if(isset($_SESSION['list'])){?> 
                        <table class="list-vic">
                            <tr>
                                <td>
                                    <table>
                                    <th style="width: 100px;">CCCD</th>
                                    <th>Họ và tên</th>
                                    <th style="width: 80px;">Ngày sinh</th>
                                    <th style="width: 90px;">Khoa điều trị</th>
                                    <th style="width: 90px;">Thông tin</th>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="scroll-table">  
                                        <table ><?php
                                            foreach($_SESSION['list'] as $vic){ ?>
                                                <tr>
                                                    <td style="padding-left: 5px; width: 100px;"><?php echo $vic['CCCD'];?></td>
                                                    <td style="padding-left: 5px;"><?php echo $vic['name'];?></td>
                                                    <td style="padding-left: 5px; width: 80px;"><?php echo $vic['dateOfBorn'];?></td>
                                                    <td style="padding-left: 5px; width: 90px;"><?php echo $vic['position'];?></td>
                                                    <td style="width: 90px;"><a class="align-table" href="">thông tin</a> </td> 
                                                </tr><?php
                                            }?>
                                        </table>    
                                    </div>
                                </td>
                            </tr>
                        </table><?php
                        unset($_SESSION['list']);
                    }else{
                        $rdb = new firebaseRDB($databaseURL);
                        $retrive = $rdb->retrieve("/vicManager");
                        $data = json_decode($retrive, 1);
                        if($data == ""){ ?>
                            <table class="list-vic">
                                <tr>
                                    <td>
                                        <table>
                                        <th style="width: 100px;">CCCD</th>
                                        <th>Họ và tên</th>
                                        <th style="width: 80px;">Ngày sinh</th>
                                        <th style="width: 90px;">Khoa điều trị</th>
                                        <th style="width: 90px;">Thông tin</th>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="scroll-table">  
                                        </div>
                                    </td>
                                </tr>
                            </table><?php 
                        }else{?> 
                            <table class="list-vic">
                                <tr>
                                    <td>
                                        <table>
                                        <th style="width: 100px;">CCCD</th>
                                        <th>Họ và tên</th>
                                        <th style="width: 80px;">Ngày sinh</th>
                                        <th style="width: 90px;">Khoa điều trị</th>
                                        <th style="width: 90px;">Thông tin</th>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="scroll-table">  
                                            <table ><?php
                                                foreach($data as $vic){?>
                                                    <tr>
                                                        <td style="padding-left: 5px; width: 100px;"><?php echo $vic['CCCD'];?></td>
                                                        <td style="padding-left: 5px;"><?php echo $vic['name'];?></td>
                                                        <td style="padding-left: 5px; width: 80px;"><?php echo $vic['dateOfBorn'];?></td>
                                                        <td style="padding-left: 5px; width: 90px;"><?php echo $vic['position'];?></td>
                                                        <td style="width: 90px;"><a class="align-table" href="">thông tin</a> </td> 
                                                    </tr><?php
                                                }?>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table><?php
                        }
                    }?>
                </div>
                
                <?php
                    if(isset($_SESSION['in4'])){ ?>
                    <div id="in4-insert"><?php echo $_SESSION['in4']; ?></div><?php 
                    }
                ?>
                <script>
                    setTimeout(() => {
                        let info = document.getElementById("in4-insert");
                        info.className = "show";
                    }, 3000);
                    </script>
                <?php unset($_SESSION['in4']); ?>
                <!-- insert -->
                <div class="insert-box">
                    <div class="text-insert">Thêm nhân bệnh nhân mới:</div>
                    
                    <form class="insert-form" action="insert_vic_action.php" method="post">
                        <div>CCCD:</div>
                        <input class="search-ID" type="text" name="CCCD">
                        <div>Họ và tên:</div>
                        <input class="search-name" type="text" name="namevic">
                        <div>Ngày sinh:</div>
                        <input class="search-born" type="date" name="dateofborn">
                        <div>Khoa điều trị:</div>
                        <select class="position-vic" name="positionvic">
                            <option value="Khoa Ngoại tổng hợp">Khoa Ngoại tổng hợp</option>
                            <option value="Khoa Nội tổng hợp">Khoa Nội tổng hợp</option>
                            <option value="Khoa Thần kinh">Khoa Thần kinh</option>
                            <option value="Khoa Nhi">Khoa Nhi</option>
                            <option value="Khoa Mắt">Khoa Mắt</option>
                        </select>
                        <input class="search-button" type="submit" value="Thêm">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>