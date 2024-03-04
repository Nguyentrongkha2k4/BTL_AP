<?php
include("config.php");
include("firebaseRDB.php");

if(!isset($_SESSION['user'])){
    header("location: login.php");
}
$ID = $_POST['ID'];
$namestaff = $_POST['namestaff'];
$dateofborn = $_POST['dateofborn'];
$positionstaff = $_POST['positionstaff'];
if($ID == ""){
    $_SESSION['in4'] = "Vui lòng nhập ID.";
    header("location: staff-mag.php");
}else if($namestaff == ""){
    $_SESSION['in4'] = "Vui lòng nhập họ và tên.";
    header("location: staff-mag.php");
}else if($dateofborn == ""){
    $_SESSION['in4'] = "Vui lòng nhập ngày sinh.";
    header("location: staff-mag.php");
}else if($positionstaff == ""){
    $_SESSION['in4'] = "Vui lòng nhập chức vụ.";
    header("location: staff-mag.php");
}else if($ID && $namestaff && $dateofborn && $positionstaff){
    $rdb = new firebaseRDB($databaseURL);
    $retrieve = $rdb->retrieve("/staffManager", "ID", "EQUAL", $ID);
    $data = json_decode($retrieve, 1);
    if(count($data) > 0){
        $_SESSION['in4'] = "Nhân viên đã tồn tại.";
        header("location: staff-mag.php");
    }else{
        $insert = $rdb->insert("/staffManager", [
            "ID" => $ID,
            "name" => $namestaff,
            "dateOfBorn" => $dateofborn,
            "position" => $positionstaff
        ]);
        $result = json_decode($insert, 1);
        if(isset($result['name'])){
            $_SESSION['in4'] = "Thêm thành công.";
            header("location: staff-mag.php");
        }else{
            $_SESSION['in4'] = "Thêm thất bại.";
            header("location: staff-mag.php");
        }
    }
}