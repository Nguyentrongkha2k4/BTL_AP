<?php

use function PHPSTORM_META\type;

include("config.php");
include("firebaseRDB.php");

if(!isset($_SESSION['user'])){
    header("location: login.php");
}

$IDStaff = $_POST['IDStaff'];
$nameStaff = $_POST['nameStaff'];
$dateOfBorn = $_POST['dateOfBorn'];
$positionStaff = $_POST['positionStaff'];

$rdb = new firebaseRDB($databaseURL);
$retrive = $rdb->retrieve("/staffManager");
$data = json_decode($retrive, 1);
$_SESSION['list'] = $data;
header("location: staff-mag.php");