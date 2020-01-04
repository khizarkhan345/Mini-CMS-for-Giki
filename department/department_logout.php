<?php
session_start();
 session_destroy();
 header("location:department_login.php");
?>