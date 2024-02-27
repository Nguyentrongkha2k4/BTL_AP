<?php
include("config.php");
include("firebaseRDB.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

if($name == ""){
    echo "Name is required!";
}else if($email == ""){
    echo "Email is required!";
}else if($password == ""){
    echo "Password is required!";
}else if($role == 0){
    echo "Choose your role!";
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
            "password" => md5($password),
            "role" => $role
        ]);

        $result = json_decode($insert, 1);
        if(isset($result['name'])){
            echo "Sign up success, please login";
        }else{
            echo "Sign up failed";
        }
    }
}