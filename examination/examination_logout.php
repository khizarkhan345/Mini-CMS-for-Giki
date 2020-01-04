<?php
session_start();
 session_destroy();
 header("location:examination_login.php");
?>