<!DOCTYPE html>
<html>
    <head>
        <title>Bank | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/w31.css">
        <link rel="stylesheet" href="../css/w3-theme-teal.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
    </head>
    <body>
        <div class="w3-row">
            <div class="w3-third"><p></p></div>
            <div class="w3-third">
                <div style="margin-top: 15%"></div>
                <form action="javascript:void(0)" class="w3-container w3-card-4 w3-white w3-text-black w3-margin" onsubmit="return false">

                    <h2 class="w3-center">Admin | Login</h2>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-user"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="loginid" type="text" placeholder="Username">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-lock"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="accesscode" type="text" placeholder="Password">
                        </div>
                    </div>
                    <div id="msgbox"></div>
                    <p class="w3-center">
                        <button class="w3-btn w3-teal w3-section w3-ripple" onclick="admin.auth()"> Send </button>
                    </p>
                </form>
            </div>
            <div class="w3-third"></div>
        </div>

        <!--jQuery-->
        <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>

        <!--Custom js-->
        <script type="text/javascript" src="../js/admin.js"></script>
    </body>
</html>