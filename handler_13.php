<?php
session_start();


if (isset($_SESSION)){
    $submit=$_SESSION['submit'];
    $_SESSION['submit']++;
    }

header("location: /task_13.php");