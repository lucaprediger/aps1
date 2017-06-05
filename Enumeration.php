<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of enumPermissoes
 *
 * @author marcio
 */
abstract class Enumeration {

    public static function enum() {
        $reflect = new ReflectionClass(get_called_class());
        return $reflect->getConstants();
    }

}

