<?php
session_start();
if($_SESSION['username']) {
    session_destroy();
    header("Location: ../../article/view/login.php");
    exit;
}
?>