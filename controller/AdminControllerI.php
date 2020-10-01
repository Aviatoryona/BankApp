<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Aviator
 */
interface AdminControllerI {

    function login($userName, $pwd);

    function totalProfit();

    function getClients();

    function getTransactions();

    function getClient($id);

    function editClient(Customer $customer);

    function removeClient($id);
}
