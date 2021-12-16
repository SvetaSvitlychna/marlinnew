<?php
session_start();

for ($i = 0; $i<count($_FILES['image']['name']); $i++){
    uploads_file($_FILES['image']['name'][$i], $_FILES['image']['tmp_name'][$i]);
    }

function uploads_file($file,$tmp_name){

    $result=pathinfo($file);
    $filename =time()."_".$result['filename']. "." .$result['extension'];
    move_uploaded_file($tmp_name, 'uploads/' . $filename);
    $pdo =new PDO ("mysql:host=localhost;dbname=marlinnew", "root", "");
    $sql = "INSERT INTO images (image) VALUES ('$filename')";
    $statement = $pdo->prepare($sql);
    $statement->execute(['image' => $filename]);
    $image = $filename;
    $_SESSION['image'] = $image;
}


header("Location: /task_17.php");
