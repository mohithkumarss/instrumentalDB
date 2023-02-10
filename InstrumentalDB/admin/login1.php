<?php
include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    html,
    body {
        height: 100%;
    }

    body {
        display: grid;
        place-items: center;
        text-align: center;
        background: #dde1e7;
    }

    .wrapper1 {
        width: 360px;
        background: #dde1e7;
        border-radius: 10px;
        padding: 40px 30px;
        box-shadow: -3px -3px 7px #ffffff73, 2px 2px 5px rgba(94, 104, 121, 0.288);
    }

    .wrapper1 h2 {
        font-size: 23px;
        font-weight: 600;
        margin-bottom: 35px;
        color: rgb(44, 44, 44);
    }

    .form-group input {
        height: 2.75rem;
        width: 100%;

        font-size: 10px;
        outline: none;
        border: none;
        color: #595959;
        background: #dde1e7;
        border-radius: 25px;
        box-shadow: inset 2px 2px 5px #babecc, inset -5px -5px 10px #ffffff73;
    }

    .form-group input:focus~label {
        box-shadow: inset 2px 2px 5px #babecc, inset -1px -1px 2px #ffffff73;
    }

    .form-group .btn {
        margin: 15px 0;
        width: 100%;
        height: 50px;
        color: #000;
        font-size: 15px;
        font-weight: 600;
        background: #dde1e7;
        border: none;
        outline: none;
        border-radius: 25px;
        box-shadow: 2px 2px 5px #babecc, -5px -5px 10px #ffffff73;
    }

    .form-group label {
        display: flex;
        text-align: left;
        font-size: 12px;
    }

    .form-group label span {
        display: flex;
        text-align: left;
        font-size: 15px;
        margin-right: .75rem;
        margin-left: 1.5rem;
    }

    .wrapper1 p {
        font-size: 12px;
        background-color: teal;
        color: white;
        padding: 1rem;
        border-radius: 6px;
    }

    .text-center i {
        color: teal;
        font-size: 14px;
        margin-right: 0.2rem;
    }

    p {
        font-size: 10px;
        padding: 1%;
        color: gray;
    }

    .success {
        color: teal;
        text-align: start;
        margin: 3rem 0 2rem 4rem;
    }
</style>

<body>
    <div class="wrapper1">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="" method="POST">
            <div class="form-group">
                <label><span class="fas fa-user"></span>Username</label>
                <input type="text" name="username" class="form-control" value="">
            </div>
            <div class="form-group">
                <label><span class="fas fa-lock"></span>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
    </div>
    <p class="text-center"><i class="fa-regular fa-copyright"></i>
        2023. All rights reserved, Instrumental Database <br> Developed by - <a
            href="https://www.linkedin.com/in/mohithkumarss/" target="_blank" style=" color: teal;">Mohith
            Kumar</a></p>
</body>

</html>


<?php
ob_start();
if (isset($_POST['submit'])) {
    //process login
    //get data from Form
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    //2.sql to check whether user with username and password exists or not
    $sql = "SELECT * FROM t_admin WHERE username='$username' AND password='$password'";
    //3.exe query
    $res = mysqli_query($conn, $sql);
    //4.count rows to check whether user exists or not
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        //user availabe
        echo $_SESSION['login'] = "<div class='success'>Login Successful</div>";
        $_SESSION['user'] = $username; //checking login
        //redirect ot home 
        header("location:" . URL . "admin/index.php");
    } else {
        //user not available nd login fail
        echo $_SESSION['login'] = "Login Failed";
        //redirect ot home 
        header('location:' . URL . 'admin/login1.php');
    }
}

?>