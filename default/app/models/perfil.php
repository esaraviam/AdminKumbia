<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perfil
 *
 * @author equipo
 */
class Perfil extends ActiveRecord{
    //put your code here
    
    function initialize(){
        $this->has_many("usuario");
    }
    
}
