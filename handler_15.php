<?php
session_start();

if (isset($_POST['submit'])){
    session_unset();
    session_destroy();
}

header("LOCATION:/task_14.php");