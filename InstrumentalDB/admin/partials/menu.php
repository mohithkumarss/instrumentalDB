<?php include('../config/constants.php');
include('security.php')
    ?>

<html>

<head>
    <title>Instrumental Database - Home</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <!-- Menu start -->
    <header class="menu text-center">
        <div class="wrappermenu">
            <p>Instrumental Database</p>
            <ul>
                <li><a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=instrumentalDB"
                        target="_blank">D B</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-product.php">Product</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li> <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </div>
    </header>
    <!-- Menu end -->