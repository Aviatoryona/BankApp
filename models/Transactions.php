<?php

/**
 * Description of Transactions
 *
 */
class Transactions {

    private $tr_id, $tr_accountnumber, $tr_amount, $tr_charge, $tr_date, $tr_type;

    public function getTr_id() {
        return $this->tr_id;
    }

    public function getTr_accountnumber() {
        return $this->tr_accountnumber;
    }

    public function getTr_amount() {
        return $this->tr_amount;
    }

    public function getTr_charge() {
        return $this->tr_charge;
    }

    public function getTr_date() {
        return $this->tr_date;
    }

    public function getTr_type() {
        return $this->tr_type;
    }

    public function setTr_id($tr_id) {
        $this->tr_id = $tr_id;
        return $this;
    }

    public function setTr_accountnumber($tr_accountnumber) {
        $this->tr_accountnumber = $tr_accountnumber;
        return $this;
    }

    public function setTr_amount($tr_amount) {
        $this->tr_amount = $tr_amount;
        return $this;
    }

    public function setTr_charge($tr_charge) {
        $this->tr_charge = $tr_charge;
        return $this;
    }

    public function setTr_date($tr_date) {
        $this->tr_date = $tr_date;
        return $this;
    }

    public function setTr_type($tr_type) {
        $this->tr_type = $tr_type;
        return $this;
    }

}
