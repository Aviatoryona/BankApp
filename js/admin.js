/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var admin = {};

/*
 *
 * @returns {undefined}
 */
admin.auth = function () {
    var loginId = $('input[name="loginid"]').val();
    var pwd = $('input[name="accesscode"]').val();
    if (loginId != '' && pwd != '') {
        $.post('../app.php', {
            'action': 'admin-auth',
            'username': loginId,
            'pwd': pwd
        }, function (data) {
            console.log(data);
            var res = JSON.parse(data);
            if (res.success) {
                window.location.replace('admin.php');
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
admin.totalProfit = function () {
    w3_close();
    $.get('../app.php?action=total-profit', function (data) {
        $('#page-content').html(data);
    });
};

/*
 *
 */
admin.clients = function () {
    w3_close();
    $.get('../app.php?action=all-clients', function (data) {
        $('#page-content').html(data);
    });
};

/*
 *
 */
admin.transactions = function () {
    w3_close();
    $.get('../app.php?action=all-transactions', function (data) {
        $('#page-content').html(data);
    });
};

/*
 *
 */
admin.clientDetails = function (parent) {
    var id = $(parent).html().trim();
    w3_close();
    $.get(`../app.php?action=client-details&id=${id}`, function (data) {
        $('#page-content').html(data);
    });
};

/*
 *
 */
admin.clientRemove = function () {
    var ck = confirm("Sure to remove client and related info?");
    if (ck) {
        var id = $('#email').val();
        $.get(`../app.php?action=client-remove&id=${id}`, function (data) {
            $('#page-content').html(data);
        });
    }
};
/*
 *
 */
admin.clientEdit = function () {
    var id = $('#email').val();
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var phone = $('#phone').val();
    if (fname == '' || lname == '' || phone == '') {
        return;
    }
    $.post(`../app.php`, {
        "action": "client-edit",
        "fname": fname,
        "lname": lname,
        "phone": phone,
        "id": id
    }, function (data) {
        var res = JSON.parse(data);
        if (res.success) {
            $('#msgbox').html(`<div class="w3-container w3-green"><p>${res.message}</p></div>`);
        } else {
            $('#msgbox').html(`<div class="w3-container w3-red"><p>${res.message}</p></div>`);
        }
        setTimeout(function () {
            $('#msgbox').html(``);
        }, 3000);
    });
};