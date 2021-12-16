<?php
session_start();

$pass = $_POST['password'];

function check_user($email, $password){
    $pdo =new PDO("mysql:host=localhost;dbname=marlinnew;","root","");
    $sql = "SELECT * FROM  `registration` WHERE `email`=:email";
    $statement =$pdo->prepare($sql);
    $statement->execute(["email"=>$email]);
    $result=$statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function redirect_path($path){
    header("LOCATION:".$path);
    exit;
}

function set_flash_message($message){
    $_SESSION['message']=$message;

}

$user = check_user($_POST['email'], $_POST['password']);


if (empty($user['email'])){
    $message="Такого пользователя нет в базе";
    $_SESSION['message'] =$message;
    }else{
        if(password_verify($pass, $user['password'])){
            $verified_user =$user['email'];
            $_SESSION['id'] = $verified_user;
            redirect_path("task_15.php");
        }else{
            $message="неверный пароль";
            $_SESSION['message'] =$message;
            redirect_path("task_14.php");
    }

    redirect_path("task_14.php");
}
redirect_path("task_14.php");