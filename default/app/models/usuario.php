<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author equipo
 */
class Usuario extends ActiveRecord {

    //put your code here

    function initialize() {
        $this->belongs_to("usuario");
    }

    function before_create() {
        $this->password = md5($this->password);
    }

    function checkLogin($login, $password) {

        $item = $this->find_first("conditions: login = '$login'");
        if ($item->password == md5($password)) {
            Session::set("login", $item->login);
            Session::set("nombre", $item->nombre);
            Session::set("userId", $item->id);
            return true;
        }
        return false;
    }

}
