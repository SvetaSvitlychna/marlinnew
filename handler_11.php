<?php
session_start();


function check_user_by_email($email){
    $pdo = new PDO ('mysql:host=localhost;dbname=marlinnew','root', '');
    $sql = "SELECT * FROM registration WHERE email =:email";
    $statement=$pdo->prepare($sql);
    $statement->execute(['email'=>$email]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function redirect_to($path){
    header("LOCATION:".$path);
    exit;
}
function setFlashMessage ($message){
    $_SESSION['message'] = $message;
    redirect_to('task_11.php');
}
$user = check_user_by_email($_POST['email']);
if (!empty($user)){
    $message = setFlashMessage("Этот электронный адрес уже есть в базе");
    redirect_to('task_11.php');
}


function add_new_user($email, $password){
    $pdo = new PDO ('mysql:host=localhost;dbname=marlinnew','root', '');
    $sql = "INSERT INTO registration (email, password) VALUE(:email, :password)";
    $statement=$pdo->prepare($sql);
    $statement->execute(['email'=>$email,'password'=>password_hash($_POST['password'], PASSWORD_DEFAULT)]);

    }

add_new_user($_POST['email'], $_POST['password']);

redirect_to('task_11.php');
