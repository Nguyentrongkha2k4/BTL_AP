<?php
include("config.php");
include("firebaseRDB.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordconfirm = $_POST['password-confirm'];

if($name == ""){
    header("location: signup.php?error=Name is required");
    exit();
}else if($email == ""){
    header("location: signup.php?error=Email is required");
    exit();
}else if($password == ""){
    header("location: signup.php?error=Enter a password");
    exit();
}else if($passwordconfirm == ""){
    header("location: signup.php?error=Confirm your password");
    exit();
}else if($password != $passwordconfirm){
    header("location: signup.php?error=Those passwords didn't match. Try again.");
    exit();
}else{
    $rdb = new firebaseRDB($databaseURL);
    $retrieve = $rdb->retrieve("/user", "email", "EQUAL", $email);
    $data = json_decode($retrieve, 1);

    if(count($data) > 0){
        echo "Email already used";
    }else{
        $insert = $rdb->insert("/user", [
            "name" => $name,
            "email" => $email,
            "password" => md5($password)
        ]);

        $result = json_decode($insert, 1);
        if(isset($result['name'])){
            header("location: signup.php?in4=Sign up success, please login");
        }else{
            echo "Sign up failed";
        }
    }
}