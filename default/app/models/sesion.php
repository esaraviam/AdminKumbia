<?php

class Sesion {

    /**
     * revisa si esta efectivamente logeado
     */
    public static function logged() {
        return Session::has('login') && Session::get('userId') > 0;
    }

    function setLogin($login, $password) {
        $item = (new Usuario)->checkLogin($login , $password);

        try {
            if ($item->password == md5($password)) {
                Session::set("login", $item->login);
                Session::set("nombre", $item->nombre);
                Session::set("userId", $item->id);
                Flash::valid('Bienvenid@ ' . $item->nombre);
                return true;
            }
        } catch (Exception $ex) {
            return false;
        }
    }

   public static function destroy() {
        Session::delete('login');
        Session::delete('nombre');
        Session::delete('userId');
        return true;
    }

}
