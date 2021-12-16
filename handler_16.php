<?php
session_start();


$pdo =new PDO ("mysql:host=localhost;dbname=marlinnew", "root", "");
$path ='uploads/'. time(). $_FILES['image']['name'];
$filename = time().$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], $path);
$sql = "INSERT INTO images (image) VALUES ('$filename')";
$statement = $pdo->prepare($sql);
$statement->execute(['image' => $filename]);

$image = $filename;
$_SESSION['image'] = $image;

header("Location: /task_16.php");