<?php
include('../config/constants.php');
//1.destroy session
session_destroy();
//2.redirect to login
header('location:' . URL . '/admin/login1.php');
?>