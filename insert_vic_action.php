<?php
include("config.php");
include("firebaseRDB.php");

if(!isset($_SESSION['user'])){
    header("location: login.php");
}

$CCCD = $_POST['CCCD'];
$namevic = $_POST['namevic'];
$dateofborn = $_POST['dateofborn'];
$positionvic = $_POST['positionvic'];

if($CCCD == ""){
    $_SESSION['in4'] = "Vui lòng nhập CCCD.";
    header("location: vic-mag.php");
}else if($namevic == ""){
    $_SESSION['in4'] = "Vui lòng nhập họ và tên.";
    header("location: vic-mag.php?");
}else if($dateofborn == ""){
    $_SESSION['in4'] = "Vui lòng nhập ngày sinh.";
    header("location: vic-mag.php");
}else if($positionvic == ""){
    $_SESSION['in4'] = "Vui lòng nhập khoa điều trị.";
    header("location: vic-mag.php");
}else if($CCCD && $namevic && $dateofborn && $positionvic){
    $rdb = new firebaseRDB($databaseURL);
    $retrieve = $rdb->retrieve("/vicManager", "CCCD", "EQUAL", $CCCD);
    $data = json_decode($retrieve, 1);
    if(count($data) > 0){
        $_SESSION['in4'] = "Bệnh nhân đã tồn tại.";
        header("location: vic-mag.php");
    }else{
        $insert = $rdb->insert("/vicManager", [
            "CCCD" => $CCCD,
            "name" => $namevic,
            "dateOfBorn" => $dateofborn,
            "position" => $positionvic
        ]);
        $result = json_decode($insert, 1);
        if(isset($result['name'])){
            $_SESSION['in4'] = "Thêm thành công.";
            header("location: vic-mag.php");
        }else{
            $_SESSION['in4'] = "Thêm thất bại.";
            header("location: vic-mag.php");
        }
    }
}