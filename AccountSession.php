<?php
session_start();

class AccountSession {

    public static function load() {
        if(isset($_SESSION['email']) && isset($_SESSION['a_id']))
            return new AccountSession($_SESSION['email'], $_SESSION['a_id']);
        return false;
    }

    public static function is_logged_in() {
        if(isset($_SESSION['email']) && isset($_SESSION['a_id']))
            return true;
        return false;
    }

    public static function login($email, $a_id) {
        return new AccountSession($email, $a_id);
    }

    private $email;
    private $a_id;

    public function __construct($email, $a_id) {
        $this->email = $email;
        $this->a_id = $a_id;
        $_SESSION['email'] = $email;
        $_SESSION['a_id'] = $a_id;
    }

    function get_id() {
        return $this->a_id;
    }

    function get_email() {
        return $this->email;
    }

    public static function logout() {
        session_destroy();
        return true;
    }
}