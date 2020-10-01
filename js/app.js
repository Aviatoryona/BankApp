$(document).ready(function () {

});
/*
 * function to perform login
 */
function login() {
    var loginId = $('input[name="loginid"]').val();
    var pwd = $('input[name="accesscode"]').val();
    if (loginId != '' && pwd != '') {
        $.post('app.php', {
            'action': 'auth',
            'loginid': loginId,
            'pwd': pwd
        }, function (data) {
            console.log(data);
            var res = JSON.parse(data);
            if (res.success) {
                window.location.replace('dashboard.php');
            } else {
                $('#msgbox').html(`<div class="w3-container w3-red"><p>Incorrect credentials</p></div>`);
                setTimeout(function () {
                    $('#msgbox').html(``);
                }, 3000);
            }
        });
    }
}

/*
 *
 */
function deposit() {
    var amt = $('input[name="amt"]').val();
    if (amt > 4 && amt < 1000001) {
        $.post('app.php', {
            "action": "deposit",
            "amount": amt
        }, function (data) {
            var res = JSON.parse(data);
            if (res.success) {
                $('#msgbox').html(`<div class="w3-container w3-green"><p>Transaction successful</p></div>`);
            } else {
                $('#msgbox').html(`<div class="w3-container w3-red"><p>${res.message}</p></div>`);
            }
            setTimeout(function () {
                setTimeout(function () {
                    $('#msgbox').html(``);
                }, 3000);
            }, 4000);
        });
    }
}

/*
 *
 */
function withdraw() {
    var amt = $('input[name="amt"]').val();
    if (amt > 4 && amt < 1000001) {
        $.post('app.php', {
            "action": "withdraw",
            "amount": amt
        }, function (data) {
            var res = JSON.parse(data);
            if (res.success) {
                $('#msgbox').html(`<div class="w3-container w3-green"><p>Transaction successful</p></div>`);
            } else {
                $('#msgbox').html(`<div class="w3-container w3-red"><p>${res.message}</p></div>`);
            }
            setTimeout(function () {
                setTimeout(function () {
                    $('#msgbox').html(``);
                }, 3000);
            }, 4000);
        });
    }
}

/*
 *
 */
function transfer() {
    var amt = $('input[name="amt"]').val();
    var receiver = $('input[name="receiverid"]').val();
    if (amt > 4 && amt < 1000001 && (receiver != '')) {
        $.post('app.php', {
            "action": "transfer",
            "amount": amt,
            "receiverid": receiver
        }, function (data) {
            var res = JSON.parse(data);
            if (res.success) {
                $('#msgbox').html(`<div class="w3-container w3-green"><p>Transaction successful</p></div>`);
            } else {
                $('#msgbox').html(`<div class="w3-container w3-red"><p>${res.message}</p></div>`);
            }
            setTimeout(function () {
                setTimeout(function () {
                    $('#msgbox').html(``);
                }, 3000);
            }, 4000);
        });
    }
}

/*
 *
 */
function loadBalance() {
    w3_close();
    $.get('app.php?action=bal', function (data) {
        $('#page-content').html(data);
    });
}

/*
 *
 */
function loadDepositView() {
    w3_close();
    $.get('app.php?action=deposit-view', function (data) {
        $('#page-content').html(data);
    });
}

/*
 *
 */
function loadWithdrawView() {
    w3_close();
    $.get('app.php?action=withdraw-view', function (data) {
        $('#page-content').html(data);
    });
}

/*
 *
 */
function loadtransferView() {
    w3_close();
    $.get('app.php?action=transfer-view', function (data) {
        $('#page-content').html(data);
    });
}

/*
 *
 */
function loadTransactionsView() {
    w3_close();
    $.get('app.php?action=tr-view', function (data) {
        $('#page-content').html(data);
    });
}