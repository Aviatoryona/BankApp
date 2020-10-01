<?php
session_start();
if (isset($_GET['q']) || !isset($_SESSION['user'])) {
    session_destroy();
    header("location: ./");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Welcome</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/w3.css">
        <link rel="stylesheet" href="css/w3-theme-teal.css">
        <link rel="stylesheet" href="css/css_002.css">
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <style>
            .w3-sidebar a {font-family: "Roboto", sans-serif}
            body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
        </style>
    </head>
    <body class="w3-content" style="max-width:1200px">
        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
                <h3 class="w3-wide"><b>MyBank</b></h3>
            </div>
            <div class="w3-padding-64 w3-medium w3-text-grey" style="font-weight:bold">
                <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="loadBalance()">Balance</a>
                <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="loadDepositView()">Deposit</a>
                <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="loadWithdrawView()">Withdraw</a>
                <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="loadtransferView()">Transfer</a>
                <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="loadTransactionsView()">Transactions</a>
            </div>
            <a href="dashboard.php?q=89" class="w3-bar-item w3-button w3-padding">Log Out</a>
        </nav>

        <!-- Top menu on small screens -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-padding-24 w3-wide">My Account</div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        </header>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px">

            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>

            <!-- Top header -->
            <header class="w3-container w3-xlarge">
                <p class="w3-left">My Account</p>
            </header>

            <div class="w3-container w3-padding-jumbo" id="page-content"></div>


            <footer class="w3-container w3-theme w3-padding-jumbo" style="margin-top: 75%">
                <h5>My Bank</h5>
                <p>&copy;<?= date('Y') ?></p>
            </footer>
            <!-- End page content -->
        </div>

        <!--jQuery-->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

        <!--Custom js-->
        <script type="text/javascript" src="js/app.js"></script>

        <!--other js functions to toggle page-->
        <script>
            loadBalance();
            // Accordion
            function myAccFunc() {
                var x = document.getElementById("demoAcc");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }

            // Script to open and close sidebar
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("myOverlay").style.display = "block";
            }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("myOverlay").style.display = "none";
            }
        </script>


    </body>
</html>