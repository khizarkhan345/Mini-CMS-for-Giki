<?php
session_start();
 session_destroy();
 header("location:instructor_login.php");
?>