<?php
if (!isset($_SESSION['user'])) {
    //user is not logged in 
    //redirect to login
    $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel</div>";
    header('location:' . URL . 'admin/login1.php');
}
?>