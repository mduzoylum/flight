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
        $this->host = getenv('MYSQL_HOST', true) ?: getenv('MYSQL_HOST');
        $this->user = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
        $this->pass = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');
        $this->db = getenv('MYSQL_DATABASE', true) ?: getenv('MYSQL_DATABASE');
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
