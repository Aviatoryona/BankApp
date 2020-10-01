<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Aviator
 */
abstract class Controller {
    /*
     *
     */

    public static function getConnection() {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB);

        if (!$con) {
            die("Unable to connect");
        }
        return $con;
    }

    /*
     *
     */

    public function getResponse($succes, $message, $object) {
        return array(
            "success" => $succes,
            "message" => $message,
            "object" => $object
        );
    }

}
