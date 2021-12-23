<?php
session_start();


for ($i = 0; $i<count($_FILES['image']['name']); $i++){
    uploads_file($_FILES['image']['name'][$i], $_FILES['image']['tmp_name'][$i]);
}

function uploads_file($file,$tmp_name){

    $result=pathinfo($file);
    $filename =uniqid()."_".$result['filename']. "." .$result['extension'];
    move_uploaded_file($tmp_name, 'uploads/' . $filename);
    $pdo =new PDO ("mysql:host=localhost;dbname=marlinnew", "root", "");
    $sql = "INSERT INTO images (image) VALUES ('$filename')";
    $statement = $pdo->prepare($sql);
    $statement->execute(['image' => $filename]);
    $image = $filename;
    $_SESSION['image'] = $image;
}

function delete_file($data)
{
    $id = $_GET['id'];

    $pdo = new PDO ('mysql:host=localhost;dbname=marlinnew','root', '');
    $sql =("SELECT * FROM `images` WHERE `id`=:id");
    $statement=$pdo->prepare($sql);
    $statement->execute(['id'=>$data]);
    $result=$statement->fetchALL(PDO::FETCH_ASSOC);


    $imageUrl = "uploads/".$result[0]['image'];

    if(file_exists($imageUrl)){

        unlink($imageUrl);

        $pdo =new PDO ("mysql:host=localhost;dbname=marlinnew", "root", "");
        $sql = "DELETE FROM `images` WHERE id = '$id'";

        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);
    }

}
delete_file($_GET['id']);

header("Location: /task_16_1.php");