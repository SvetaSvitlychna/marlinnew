<?php
session_start();


function add_new_content($data){

    $pdo =new PDO("mysql:host=localhost;dbname=marlinnew;","root","");
    $sql = "INSERT INTO texts (content) VALUES (:content)";
    $statement=$pdo->prepare($sql);
    $statement->execute(['content'=>$data]);

}

function return_to($path){
    header ("LOCATION:".$path);
    exit;
}
function set_flash_message($message){
    $_SESSION['message'] = $message;
    return_to('task_12.php');
}


add_new_content($_POST['content']);

$message=set_flash_message('Спасибою Ваше сообщение отправлено');



return_to('task_12.php');

