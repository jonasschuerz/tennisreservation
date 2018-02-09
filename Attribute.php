<?php

include_once 'Database.php';

class Attribute {

    public static function get($key) {
        return Database::get_instance()->to_array(Database::get_instance()->query("SELECT * FROM `attribute` WHERE `key`='" . $key . "' ORDER BY `id` DESC LIMIT 1;"));

    }

    public static function add($key, $value) {
        return Database::get_instance()->query("INSERT INTO `attribute` (`key`, `value`) VALUES ('" . $key . "', '" . $value . "')");
    }
}