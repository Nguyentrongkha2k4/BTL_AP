<?php
include("config.php");
include("firebaseRDB.php");

if(!isset($_SESSION['user'])){
    header("location: login.php");
}

$CCCD = $_POST['CCCDVic'];
$namevic = $_POST['nameVic'];
$dateofborn = $_POST['dateOfBorn'];
$positionVic = $_POST['positionVic'];

$rdb = new firebaseRDB($databaseURL);
$retrive = $rdb->retrieve("/vicManager");
$data = json_decode($retrive, 1);
$_SESSION['list'] = $data;
header("location: vic-mag.php");