<?php
session_start(); ob_start();

if(isset($_SESSION['usr_id'])) {
    session_destroy();
    unset($_SESSION['usr_id']);
    unset($_SESSION['usr_name']);
    header("Location: index");
} else {
    header("Location: index");
}
?>

