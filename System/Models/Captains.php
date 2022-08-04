<?php

namespace MD\Models;

class Captains
{
    private $db;

    public function __construct()
    {
        $this->db = \MD\Drivers\Mysql::getInstance();
    }

    public function query($query)
    {
        $this->db->connect();
        return $this->db->query($query);
    }

}