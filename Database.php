<?php

class Database {

    private $hostname = "127.0.0.1";
    private $username = "root";
    private $password = "";
   // private $port = "32771";
    private $db_name = "syp";

    private $connection = false;

    private static $database = null;

    private function Database() {
        if($this->connection === false)
            $this->connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->db_name);
    }

    public function to_array($res) {
        $data = Array();
        if($res) {
            while ($row = $res->fetch_object()) {
                array_push($data, $row);
            }
            $res->close();
        }
        return $data;
    }

    public static function get_instance() {
        if (Database::$database === null)
            Database::$database = new Database();
        return Database::$database;
    }

    public function query($sql_query) {
        if ($this->connection === false)
            return false;
        return mysqli_query($this->connection, $sql_query);
    }

    public function get_connection() {
        return $this->connection;
    }

    public function close() {
        if($this->connection !== false)
            mysqli_close($this->connection);
        Database::$database = null;
    }

    public function error() {
        return mysqli_error($this->connection);
    }

    public static function date() {
        return date("Y-m-d H:i:s");
    }
}