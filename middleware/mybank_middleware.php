<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!isset($_POST['action']) && !isset($_GET['action'])) {
    die("Unknown action");
}

$action = isset($_POST['action']) ? $_POST['action'] : $_GET['action'];

//do login
function login() {
    $loginId = $_POST['loginid'];
    $password = $_POST['pwd'];
    $bank = new MyBank();

    $user = $bank->auth($loginId, $password);

    if (!is_null($user)) {
        session_start();
        $_SESSION["user"] = $user;

        die(json_encode($bank->getResponse(true, "Login Successfull", $user)));
    }
    die(json_encode($bank->getResponse(false, "Incorrect credentials", $user)));
}

function balance() {
    session_start();
    $user = null;
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        die('<h1>Kindly login again</h1>');
    }
    $bal = (new MyBank())->balance($user->getCt_id());
    include './views/balance.php';
}

function deposit() {
    $bank = new MyBank();
    try {
        if (!isset($_POST['amount'])) {
            throw new Exception('');
        }
        $amount = $_POST['amount'];
        $user = null;
        session_start();
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }
        if (doubleval($amount) > 5 && !is_null($user)) {
            die(json_encode($bank->deposit($user->getCt_id(), $amount)));
        }
        throw new Exception('');
    } catch (Exception $e) {
        die(json_encode($bank->getResponse(false, "Invalid amount", null)));
    }
}

function withdraw() {
    $bank = new MyBank();
    try {
        if (!isset($_POST['amount'])) {
            throw new Exception('');
        }
        $amount = $_POST['amount'];
        $user = null;
        session_start();
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }
        if (doubleval($amount) > 5 && !is_null($user)) {
            die(json_encode($bank->withdraw($user->getCt_id(), $amount)));
        }
        throw new Exception('');
    } catch (Exception $e) {
        die(json_encode($bank->getResponse(false, "Invalid amount", null)));
    }
}

function transfer() {
    $bank = new MyBank();
    try {
        if (!isset($_POST['amount'])) {
            throw new Exception('');
        }
        if (!isset($_POST['receiverid'])) {
            die(json_encode($bank->getResponse(false, "Provide receiving email address", null)));
        }
        $amount = $_POST['amount'];
        $receiverId = $_POST['receiverid'];
        $user = null;
        session_start();
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }
        if (doubleval($amount) > 5 && !is_null($user)) {
            die(json_encode($bank->transfer($user->getCt_id(), $receiverId, $amount)));
        }
        throw new Exception('');
    } catch (Exception $e) {
        die(json_encode($bank->getResponse(false, "Invalid amount", null)));
    }
}

switch ($action) {
    case "auth":
        login();
        break;

    case "bal":
        balance();
        break;

    case "deposit-view":
        session_start();
        $user = null;
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        } else {
            die('<h1>Kindly login again</h1>');
        }
        include './views/deposit.php';
        break;

    case "deposit":
        deposit();
        break;

    case "withdraw-view":
        session_start();
        $user = null;
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        } else {
            die('<h1>Kindly login again</h1>');
        }
        include './views/withdraw.php';
        break;

    case "withdraw":
        withdraw();
        break;


    case "transfer-view":
        session_start();
        $user = null;
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        } else {
            die('<h1>Kindly login again</h1>');
        }
        include './views/transfer.php';
        break;

    case "transfer":
        transfer();
        break;

    case "tr-view":
        session_start();
        $user = null;
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        } else {
            die('<h1>Kindly login again</h1>');
        }
        $transactions = (new MyBank())->getTransactions($user->getCt_id());
        if (array_key_exists("success", $transactions)) {
            die('<h1>No transactions</h1>');
        }
        include './views/transactions.php';
        break;

    case "admin-auth":
        $userName = $_POST['username'];
        $pass = $_POST['pwd'];
        $admin = (new AdminController())->login($userName, $pass);
        if ($admin['success']) {
            session_start();
            $_SESSION['admin'] = $admin['object'];
        }
        die(json_encode($admin));
        break;

    case "total-profit":
        $bal = (new AdminController())->totalProfit();
        include './views/total-profit.php';
        break;

    case "all-clients":
        $customers = (new AdminController())->getClients();
        include './views/clients.php';
        break;

    case "all-transactions":
        $transactions = (new AdminController())->getTransactions();
        include './views/transactions.php';
        break;

    case "client-details":
        $id = $_GET['id'];
        $customer = (new MyBank())->getUser($id);
        include './views/customer-details.php';
        break;

    case "client-remove":
        $id = $_GET['id'];
        die(json_encode((new AdminController())->removeClient($id)));
        break;

    case "client-edit":
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $c = new Customer();
        $c->setCt_email($id);
        $c->setCt_fname($fname);
        $c->setCt_lname($lname);
        $c->setCt_phone($phone);
        die(json_encode((new AdminController())->editClient($c)));
        break;

    default:
        echo json_encode((new MyBank())->getResponse(true, "Done", ""));
        break;
}
