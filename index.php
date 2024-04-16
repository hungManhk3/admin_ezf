<?php
session_start();
include_once "./config/Connect.php";
$db = new Database();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./assets/css/style.css"></link>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/decoupled-document/ckeditor.js"></script>
    </head>
</head>

<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #12372A;">

        <a class="navbar-brand ml-5" href="./index.php">
            <img src="./assets/images/logo.png" width="80" height="80" alt="Swiss Collection">
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

    </nav>
    <!-- Sidebar -->
    <div class="sidebar" id="mySidebar">
        <div class="side-header">
            <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection">
            <h5 style="margin-top:10px;">Hello, Admin</h5>
        </div>

        <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="./index.php"><i class="fa fa-home"></i> Dashboard</a>
        <a href="#Users" onclick="showUsers()"><i class="fa fa-users"></i> Users</a>
        <a href="#Restaurant" onclick="showRestaurant(1)"><i class="fa fa-th-large"></i> Restaurant</a>
        <a href="#Dish" onclick="showDish(1)"><i class="fa fa-th"></i> Dish</a>
        <a href="#products" onclick="showPost(1)"><i class="fa fa-th"></i> Post</a>

        <!---->
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
    </div>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Users</h4>
                    <h5 style="color:white;">
                        <?php
                        $sql = "SELECT * from users";
                        $result = $db->Query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Restaurant</h4>
                    <h5 style="color:white;">
                        <?php

                        $sql = "SELECT * from restaurant";
                        $result = $db->Query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Dish</h4>
                    <h5 style="color:white;">
                        <?php

                        $sql = "SELECT * from dish";
                        $result = $db->Query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Post</h4>
                    <h5 style="color:white;">
                        <?php

                        $sql = "SELECT * from posts";
                        $result = $db->Query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>

        </div>

    </div>


    <?php
    if (isset($_GET['Restaurant']) && $_GET['Restaurant'] == "success") {
        echo '<script> alert("Restaurant Successfully Added")</script>';
    } else if (isset($_GET['Restaurant']) && $_GET['Restaurant'] == "error") {
        echo '<script> alert("Adding Unsuccess")</script>';
    }
    ?>


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>