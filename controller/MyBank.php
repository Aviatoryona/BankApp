<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyBank
 *
 */
//transaction types
define("Withdraw", "Withdraw");
define("Deposit", "Deposit");
define("Balance", "Balance");
define("Transfer", "Transfer");

//transaction charges
define("WithdrawCharge", 150.0);
define("DepositCharge", 50.0);
define("BalanceCharge", 5.0);
define("TransferCharge", 250.0);

class MyBank extends Controller implements MyBankI {
    /*
     *
     */

    public function auth($loginId, $password) {
        $con = self::getConnection();
        $sql = "SELECT * FROM customers WHERE ct_email='$loginId' AND ct_accesscode='$password'";

        $res = mysqli_query($con, $sql);
        if ($res->num_rows > 0) {
            $row = mysqli_fetch_assoc($res);
            $customer = new Customer();
            $customer->setCt_id($row['ct_id']);
            $customer->setCtDate($row['ctDate']);
            $customer->setCt_email($row['ct_email']);
            $customer->setCt_fname($row['ct_fname']);
            $customer->setCt_lname($row['ct_lname']);
            $customer->setCt_phone($row['ct_phone']);
            $customer->setCt_pic($row['ct_pic']);
            $customer->setCt_accbalance($row['ct_accbalance']);
            $customer->setCt_accesscode($row['ct_accesscode']);
            $customer->setCt_accountnumber($row['ct_accountnumber']);
            $customer->setCt_accounttype($row['ct_accounttype']);
            $customer->setCt_address($row['ct_address']);
            $customer->setCt_city($row['ct_city']);
            $customer->setCt_country($row['ct_country']);
            $customer->setCt_gender($row['ct_gender']);
            $customer->setCt_nextkin($row['ct_nextkin']);

            $con->close();
            return $customer;
        }

        $con->close();
        return null;
    }

    /*
     *
     */

    public function addTransaction($tr_accountnumber, $trasactionType, $charge, $amount) {
        $con = self::getConnection();
        $sql = "INSERT INTO transactions(tr_accountnumber,tr_amount,tr_charge,tr_type) VALUES(?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssss", $tr_accountnumber, $amount, $charge, $trasactionType);

        $res = $stmt->execute();
        return $this->getResponse($res, $res ? "Successful" : "Failed to transact", null);
    }

    /*
     *
     */

    public function balance($userId) {
        $user = $this->getUser($userId);
        if (is_null($user)) {
            return $this->getResponse(false, "User not found", null);
        }

        $amount = $user->getCt_accbalance();
        if ($amount > BalanceCharge) {
            $amount = $user->getCt_accbalance() - BalanceCharge;
        }
        $this->updateBalance($userId, $amount);
        $this->addTransaction($user->getCt_accountnumber(), Balance, BalanceCharge, $amount);
        return $this->getResponse(true, "Done", $amount);
    }

    /*
     *
     */

    public function deposit($userId, $amount) {
        if ($amount < 5 || $amount > 1000000) {
            return $this->getResponse(false, "Invalid amount, only 5-1000000", $amount);
        }
        $user = $this->getUser($userId);
        if (is_null($user)) {
            return $this->getResponse(false, "User not found", null);
        }

        $amount1 = ($user->getCt_accbalance() + $amount) - DepositCharge;
        if ($this->updateBalance($userId, $amount1)) {
            $this->addTransaction($user->getCt_accountnumber(), Deposit, DepositCharge, $amount);
            return $this->getResponse(true, "Done", $amount1);
        }
        return $this->getResponse(false, "Failed, please try again", null);
    }

    /*
     *
     */

    public function getTransactions($userId) {
        $user = $this->getUser($userId);
        $con = self::getConnection();
        if (is_null($user)) {
            return $this->getResponse(false, "User not found", null);
        }

        $tr_accountnumber = $user->getCt_accountnumber();
        $sql = "SELECT * FROM transactions WHERE tr_accountnumber='$tr_accountnumber' ORDER BY tr_id DESC";
        $query = mysqli_query($con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $t = new Transactions();
            $t->setTr_accountnumber($row['tr_accountnumber']);
            $t->setTr_amount($row['tr_amount']);
            $t->setTr_charge($row['tr_charge']);
            $t->setTr_date($row['tr_date']);
            $t->setTr_id($row['tr_id']);
            $t->setTr_type($row['tr_type']);
            array_push($result, $t);
        }

        $con->close();
        return $result;
    }

    /*
     * GET USER BY ID OR EMAIL
     */

    public function getUser($userId) {
        $con = self::getConnection();
        $sql = "SELECT * FROM customers WHERE ct_email='$userId' || ct_id='$userId'";

        $res = mysqli_query($con, $sql);
        if ($res->num_rows > 0) {
            $row = mysqli_fetch_assoc($res);
            $customer = new Customer();
            $customer->setCt_id($row['ct_id']);
            $customer->setCtDate($row['ctDate']);
            $customer->setCt_email($row['ct_email']);
            $customer->setCt_fname($row['ct_fname']);
            $customer->setCt_lname($row['ct_lname']);
            $customer->setCt_phone($row['ct_phone']);
            $customer->setCt_pic($row['ct_pic']);
            $customer->setCt_accbalance($row['ct_accbalance']);
            $customer->setCt_accesscode($row['ct_accesscode']);
            $customer->setCt_accountnumber($row['ct_accountnumber']);
            $customer->setCt_accounttype($row['ct_accounttype']);
            $customer->setCt_address($row['ct_address']);
            $customer->setCt_city($row['ct_city']);
            $customer->setCt_country($row['ct_country']);
            $customer->setCt_gender($row['ct_gender']);
            $customer->setCt_nextkin($row['ct_nextkin']);

            $con->close();
            return $customer;
        }

        $con->close();
        return null;
    }

    /*
     * Do fund transfer from one user to another
     * @param userId
     * @param receiverId ie email
     * @param amount
     */

    public function transfer($userId, $receiverId, $amount) {
        if ($amount < 5 || $amount > 1000000) {
            return $this->getResponse(false, "Invalid amount, only 5-1000000", $amount);
        }

        $receiver = $this->getUser($receiverId); //get user by email
        if (is_null($receiver)) {
            return $this->getResponse(false, "Receiving account not found", null);
        }

        $user = $this->getUser($userId);
        if (is_null($user)) {
            return $this->getResponse(false, "User not found", null);
        }

        $amount1 = $user->getCt_accbalance();
        if ($amount1 > ($amount + TransferCharge)) {
            $amount1 -= ($amount + TransferCharge);
        } else {
            return $this->getResponse(false, "Insufficient amount", $amount1);
        }


        $res = $this->deposit($receiver->getCt_id(), $amount); //deposit to receiver account
        if ($res["success"]) {
            $this->updateBalance($userId, $amount1); //update balance for user
            $this->addTransaction($user->getCt_accountnumber(), Transfer, TransferCharge, $amount);
            return $this->getResponse(true, "Done", $amount1);
        }

        return $this->getResponse(false, "Failed, please try again", null);
    }

    /*
     *
     */

    public function withdraw($userId, $amount) {
        if ($amount < 5 || $amount > 1000000) {
            return $this->getResponse(false, "Invalid amount, only 5-1000000", $amount);
        }
        $user = $this->getUser($userId);
        if (is_null($user)) {
            return $this->getResponse(false, "User not found", null);
        }

        $amount1 = $user->getCt_accbalance();
        if ($amount1 > ($amount + WithdrawCharge)) {
            $amount1 -= ($amount + WithdrawCharge);
        } else {
            return $this->getResponse(false, "Insufficient amount", $amount1);
        }
        if ($this->updateBalance($userId, $amount1)) {
            $this->addTransaction($user->getCt_accountnumber(), Withdraw, WithdrawCharge, $amount);
            return $this->getResponse(true, "Done", $amount1);
        }

        return $this->getResponse(false, "Failed, please try again", null);
    }

    /*
     * 
     */

    public function updateBalance($userId, $amount) {
        $sql = "UPDATE customers SET ct_accbalance=? WHERE ct_id=?";
        $con = self::getConnection();
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $amount, $userId);

        $res = $stmt->execute();
        $con->close();
        return $res;
    }

}
