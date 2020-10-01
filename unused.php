<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w31.css">
    <link rel="stylesheet" href="css/w3-theme-teal.css">

    <link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"><style>
        html,body,h1,h2,h3,h4,h5 {font-family: "RobotoDraft","Roboto",sans-serif;}
        .w3-sidenav a {padding:16px;font-weight:bold}
    </style>
    <body>

        <nav class="w3-sidenav w3-collapse w3-white w3-animate-left w3-card-2" style="z-index:5;width:250px;">
            <a href="#" class="w3-border-bottom w3-large w3-text-blue">
                MyBank
            </a>
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-text-teal w3-hide-large w3-closenav w3-large">Close &times;</a>
            <a href="#" class="w3-light-grey w3-medium">Home</a>
            <a href="#">Deposit</a>
            <a href="#">Withdraw</a>
            <a href="#">Transfer</a>
            <a href="#">Balance</a>
            <a href="#">Transactions</a>
            <a href="javasript:void(0)"></a>
            <a href="" class="w3-text-red w3-small"><i class="fa fa-signout"></i>Log Out</a>
        </nav>

        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer"></div>

        <div class="w3-main" style="margin-left:250px;">

            <div id="myTop" class="w3-top w3-container w3-padding-16 w3-theme w3-large">
                <i class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-right" onclick="w3_open()"></i>
                <span id="myIntro" class="w3-hide">Account Manager</span>
            </div>

            <header class="w3-container w3-theme w3-padding-64 w3-padding-jumbo">
                <h1 class="w3-xxxlarge w3-padding-16">Welcome Aviator</h1>
            </header>

            <div class="w3-container w3-padding-jumbo" id="page-content"></div>

            <footer class="w3-container w3-theme w3-padding-jumbo">
                <h5>My Bank</h5>
                <p>&copy;<?= date('Y') ?></p>
            </footer>
        </div>

        <!--jQuery-->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

        <!--Custom js-->
        <script type="text/javascript" src="js/app.js"></script>

        <!--other js function to toggle page-->
        <script>
                    function w3_open() {
                        document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
                        document.getElementsByClassName("w3-overlay")[0].style.display = "block";
                    }
                    function w3_close() {
                        document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
                        document.getElementsByClassName("w3-overlay")[0].style.display = "none";
                    }
        </script>

        <script>
            window.onscroll = function () {
                myFunction()
            };

            function myFunction() {
                if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                    document.getElementById("myTop").classList.add("w3-card-4");
                    document.getElementById("myIntro").classList.add("w3-show-inline-block");
                } else {
                    document.getElementById("myIntro").classList.remove("w3-show-inline-block");
                    document.getElementById("myTop").classList.remove("w3-card-4");
                }
            }

            function myFunc(id) {
                document.getElementById(id).classList.toggle("w3-show");
                document.getElementById(id).previousElementSibling.classList.toggle("w3-theme");
            }
        </script>
    </body>
</html>

