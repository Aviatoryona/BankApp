<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author Aviator
 */
class AdminController extends Controller implements AdminControllerI {

    public function editClient(\Customer $customer) {
        $con = self::getConnection();
        $sql = "UPDATE customers SET ct_fname=?,ct_lname=?,ct_phone=? WHERE ct_email=?";
        $stmt = $con->prepare($sql);

        $id = $customer->getCt_email();
        $fname =$customer->getCt_fname();
        $lname = $customer->getCt_lname();
        $phone = $customer->getCt_phone();
        $stmt->bind_param("ssss",
            $fname,
                $lname,
                $phone,
                $id
        );
        $stmt->execute();
        return $this->getResponse(true, "Update successfull", null);
    }

    public function getClient($id) {
        return (new MyBank())->getUser($id);
    }

    public function getClients() {
        $con = self::getConnection();
        $sql = "SELECT * FROM customers ORDER BY ct_id DESC";
        $query = mysqli_query($con, $sql);
        $result = array();
        while ($row = mysqli_fetch_assoc($query)) {
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
            array_push($result, $customer);
        }

        $con->close();
        return $result;
    }

    public function getTransactions() {
        $con = self::getConnection();
        $sql = "SELECT * FROM transactions ORDER BY tr_id DESC";
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

    public function login($userName, $pwd) {
        $con = self::getConnection();
        $sql = "SELECT * FROM users WHERE (ct_email='$userName' || usr_username='$userName') AND usr_pwd='$pwd'";

        $res = mysqli_query($con, $sql);
        if ($res->num_rows > 0) {
            $row = mysqli_fetch_assoc($res);
            return $this->getResponse(true, "Successful", $row);
        }
        return $this->getResponse(false, "Incorrect credentials", null);
    }

    public function removeClient($id) {
        $con = self::getConnection();
        $user = ($this->getClient($id));
        if (!is_null($user)) {
            $con->close();
            return $this->getResponse(false, "User not found", null);
        }
        $tr_accountnumber = $user->getCt_accountnumber();

        $id1 = $user->getCt_id();
        mysqli_query($con, "DELETE FROM transactions WHERE tr_accountnumber='$tr_accountnumber'");
        mysqli_query($con, "DELETE FROM customers WHERE ct_id='$id1'");
        return $this->getResponse(true, "Account removed", null);
    }

    public function totalProfit() {
        $con = self::getConnection();
        $sql = "SELECT SUM(tr_charge) FROM transactions";
        $res = mysqli_query($con, $sql);
        if ($res->num_rows > 0) {
            $row = mysqli_fetch_assoc($res);
            $con->close();
            return $this->getResponse(true, "", $row["SUM(tr_charge)"]);
        }

        $con->close();
        return $this->getResponse(false, "--", 0);
    }

}
