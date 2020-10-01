<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author Aviator
 */
class Customer {

    private $ct_id, $ctDate,
            $ct_email, $ct_fname, $ct_lname, $ct_phone, $ct_pic, $ct_accbalance, $ct_accesscode, $ct_accountnumber, $ct_accounttype, $ct_address, $ct_city, $ct_country, $ct_gender, $ct_nextkin;

    public function getCt_id() {
        return $this->ct_id;
    }

    public function getCtDate() {
        return $this->ctDate;
    }

    public function getCt_email() {
        return $this->ct_email;
    }

    public function getCt_fname() {
        return $this->ct_fname;
    }

    public function getCt_lname() {
        return $this->ct_lname;
    }

    public function getCt_phone() {
        return $this->ct_phone;
    }

    public function getCt_pic() {
        return $this->ct_pic;
    }

    public function getCt_accbalance() {
        return $this->ct_accbalance;
    }

    public function getCt_accesscode() {
        return $this->ct_accesscode;
    }

    public function getCt_accountnumber() {
        return $this->ct_accountnumber;
    }

    public function getCt_accounttype() {
        return $this->ct_accounttype;
    }

    public function getCt_address() {
        return $this->ct_address;
    }

    public function getCt_city() {
        return $this->ct_city;
    }

    public function getCt_country() {
        return $this->ct_country;
    }

    public function getCt_gender() {
        return $this->ct_gender;
    }

    public function getCt_nextkin() {
        return $this->ct_nextkin;
    }

    public function setCt_id($ct_id) {
        $this->ct_id = $ct_id;
        return $this;
    }

    public function setCtDate($ctDate) {
        $this->ctDate = $ctDate;
        return $this;
    }

    public function setCt_email($ct_email) {
        $this->ct_email = $ct_email;
        return $this;
    }

    public function setCt_fname($ct_fname) {
        $this->ct_fname = $ct_fname;
        return $this;
    }

    public function setCt_lname($ct_lname) {
        $this->ct_lname = $ct_lname;
        return $this;
    }

    public function setCt_phone($ct_phone) {
        $this->ct_phone = $ct_phone;
        return $this;
    }

    public function setCt_pic($ct_pic) {
        $this->ct_pic = $ct_pic;
        return $this;
    }

    public function setCt_accbalance($ct_accbalance) {
        $this->ct_accbalance = $ct_accbalance;
        return $this;
    }

    public function setCt_accesscode($ct_accesscode) {
        $this->ct_accesscode = $ct_accesscode;
        return $this;
    }

    public function setCt_accountnumber($ct_accountnumber) {
        $this->ct_accountnumber = $ct_accountnumber;
        return $this;
    }

    public function setCt_accounttype($ct_accounttype) {
        $this->ct_accounttype = $ct_accounttype;
        return $this;
    }

    public function setCt_address($ct_address) {
        $this->ct_address = $ct_address;
        return $this;
    }

    public function setCt_city($ct_city) {
        $this->ct_city = $ct_city;
        return $this;
    }

    public function setCt_country($ct_country) {
        $this->ct_country = $ct_country;
        return $this;
    }

    public function setCt_gender($ct_gender) {
        $this->ct_gender = $ct_gender;
        return $this;
    }

    public function setCt_nextkin($ct_nextkin) {
        $this->ct_nextkin = $ct_nextkin;
        return $this;
    }

}
