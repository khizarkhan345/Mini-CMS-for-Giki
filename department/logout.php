<?php
session_start();
 session_destroy();
 header("location:course_offering.php");
?>