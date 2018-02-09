<?php

include_once 'Database.php';

class Tables {

    public static function create() {
        $db = Database::get_instance();
        $db->query("CREATE TABLE IF NOT EXISTS `site` (`id` int PRIMARY KEY AUTO_INCREMENT, `title` VARCHAR(150), `link_title` VARCHAR(150), `login_page` int, `access` int);");
        $db->query("CREATE TABLE IF NOT EXISTS `attribute` (`id` int PRIMARY KEY AUTO_INCREMENT, `key` VARCHAR(150), `value` VARCHAR(150));");
        /*$db->query("CREATE TABLE IF NOT EXISTS `account` (`email` VARCHAR(150) PRIMARY KEY, `id` VARCHAR(100), `password` VARCHAR(150), `date` DATETIME);");
        $db->query("CREATE TABLE IF NOT EXISTS `public_key` (`id` int PRIMARY KEY AUTO_INCREMENT, `a_id` VARCHAR(100), `key` VARCHAR(100), `date` DATETIME);");
        $db->query("CREATE TABLE IF NOT EXISTS `whitelist` (`id` int PRIMARY KEY AUTO_INCREMENT, `a_id` VARCHAR(100), `host` VARCHAR(100), `priority` int, `date` DATETIME);");
        $db->query("CREATE TABLE IF NOT EXISTS `protocol` (`id` int primary key AUTO_INCREMENT, `a_id` VARCHAR(100), `host` VARCHAR(100), `action` varchar(200), `data` varchar(150), `date` DATETIME);");
        $db->query("CREATE TABLE IF NOT EXISTS `worker` (`id` int PRIMARY KEY AUTO_INCREMENT, `a_id` VARCHAR(100), `host` VARCHAR(100), `note` VARCHAR(150), `hashes` DOUBLE, `speed` DOUBLE, `date` DATETIME);");*/
    }
}