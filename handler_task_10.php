<?php
session_start();



function getContent($content){
    $pdo =new PDO("mysql:host=localhost;dbname=marlinnew;","root","");
    $sql = "SELECT * FROM texts WHERE content =:content";
    $statement=$pdo->prepare($sql);
    $statement->execute(['content'=>$content]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
return $result;
}

function redirect_to($path){
    header("LOCATION:" . $path);
    exit;
}
function setFlashMessage ($message){
    $_SESSION['message'] = $message;
    redirect_to('task_10.php');
}
function addNewContent($data){
    $pdo =new PDO("mysql:host=localhost;dbname=marlinnew;","root","");
    $sql = "INSERT INTO texts (content) VALUES (:content)";
    $statement=$pdo->prepare($sql);
    $statement->execute(['content'=>$data]);
    return $statement;
}
$content = getContent($_POST['content']);
if (!empty($content)){
    $message = setFlashMessage("You should check in on some of those fields below.");
    redirect_to('task_10.php');
}

addNewContent($_POST['content']);

redirect_to('task_10.php');