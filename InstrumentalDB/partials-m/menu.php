<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Instrumental Database</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <header class="menu text-center">
        <div class="wrappermenu">
            <p>Instrumental Database</p>
            <ul>
                <li><a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=instrumentalDB"
                        target="_blank">D B</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="./admin/manage-admin.php">Admin</a></li>
                <li><a href="./category.php">Category</a></li>
                <li><a href="./product.php">Product</a></li>
                <li> <a href="./admin/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </div>
    </header>
    <!-- Navbar Section Ends Here -->