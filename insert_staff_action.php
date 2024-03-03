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

if($ID && $namestaff && $dateofborn && $positionstaff){
    $rdb = new firebaseRDB($databaseURL);
    $retrieve = $rdb->retrieve("/staffManager", "ID", "EQUAL", $ID);
    $data = json_decode($retrieve, 1);
    if(count($data) > 0){
        header("location: signup.php?error=Nhân viên đã tồn tại.");
    }else{
        $insert = $rdb->insert("/staffManager", [
            "ID" => $ID,
            "name" => $namestaff,
            "dateOfBorn" => $dateofborn,
            "position" => $positionstaff
        ]);
        $result = json_decode($insert, 1);
        if(isset($result['name'])){
            header("location: staff-mag.php?in4=Thên thành công.");
        }else{
            header("location: staff-mag.php?in4=Thêm thất bại.");
        }
    }
}