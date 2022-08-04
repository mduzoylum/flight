<?php

namespace MD\Drivers;

class Mysql
{
    private static $instance = null;

    private $host;
    private $user;
    private $pass;
    private $db;

    private $conn;
    private $sql;

    public function __construct()
    {


//echo MYSQL_PASSWORD;die("##");
//        $this->host = \MD\Helper\Config::get('MYSQL_SERVER');
//        $this->user = \MD\Helper\Config::get('MYSQL_USER');
//        $this->pass = \MD\Helper\Config::get('MYSQL_PASS');
//        $this->docker = \MD\Helper\Config::get('MYSQL_DB');

        $this->host = 'mysql';
        $this->user = 'root';
        $this->pass = 'root';
        $this->db = 'flights';

//        $this->host = "127.0.0.1";
//        $this->user = "root";
//        $this->pass = "";
//        $this->docker = "crud";
    }

    static public function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function connect()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ';charset=utf8';
            $conf = array(
                'username' => $this->user,
                'password' => $this->pass,
                'options' => array()
            );
            $this->newConnection($dsn, $conf);
        } catch (\PDOException $e) {
            error_log("docker not connect.");
        }
        return $this->conn;
    }

    public function newConnection($dsn, $conf = array())
    {
        try {

            $this->conn = new \PDO($dsn, $conf['username'], $conf['password'], $conf['options']);
            return true;
        } catch (\PDOException $ex) {
            $this->error = $ex->getMessage();
            return false;
        }
    }

    public function query($query)
    {
        try {
            $this->connect();
            $this->sql = $this->conn->prepare($query);
        } catch (\PDOException $ex) {
            return $ex->getMessage();
        }
        return $this->sql;
    }

    public function execute($params = null)
    {
        return $this->sql->execute();
    }

    public function fetch($type = \PDO::FETCH_ASSOC)
    {
        $rows = $this->sql->fetch($type);
        if (!isset($rows)) {
            $rows = array();
        }
        return $rows;
    }

    public function fetchAll($type = \PDO::FETCH_ASSOC)
    {
        return $this->sql->fetchAll($type);
    }

    public function rowCount()
    {
        return $this->sql->rowCount();
    }

}
