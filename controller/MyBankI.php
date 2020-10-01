<?php

interface MyBankI {

    //login function
    function auth($loginId, $password);

    //get user by login id
    function getUser($userId);

    //returns user balance
    function balance($userId);

    //deposits user info into user's account
    function deposit($userId, $amount);

    //withdraw user info into user's account
    function withdraw($userId, $amount);

    //transfer amount user info from user's account to another
    function transfer($userId, $receiverId, $amount);

    //inserts a new transaction into table
    function addTransaction($tr_accountnumber, $trasactionType, $charge, $amount);

    //get all transactions for user
    function getTransactions($userId);

    //update balance
    function updateBalance($userId, $amount);

    //response object
    function getResponse($succes, $message, $object);
}
