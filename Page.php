<?php

include_once 'Database.php';

class Page {

    public static function get($id) {
        $res = Database::get_instance()->to_array(Database::get_instance()->query("SELECT * FROM `site` WHERE `id`='" . $id . "'"));
        if(sizeof($res) > 0)
            return $res[0];
        else
            return false;
    }

    public static function add($link_title, $title, $login_page, $access) {
        return Database::get_instance()->query("INSERT INTO `site` (`title`, `link_title`, `login_page`, `access`) VALUES ('" . $title . "', '" . $link_title . "', '" . $login_page . "', '" . $access . "');");
    }

    public static function all() {
        return Database::get_instance()->to_array(Database::get_instance()->query("SELECT * FROM `site`;"));
    }

    public static function login_page() {
        $res = Database::get_instance()->to_array(Database::get_instance()->query("SELECT * FROM `site` WHERE `login_page`='1' ORDER BY `id` DESC;"));
        if(sizeof($res) > 0)
            return $res[0];
        else
            return false;
    }

    public static function access_all($access) {
        return Database::get_instance()->to_array(Database::get_instance()->query("SELECT * FROM `site` WHERE `access`='" . $access . "';"));
    }
}