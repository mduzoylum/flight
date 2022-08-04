<?php

namespace MD\Controllers;

use MD\Models\Captains;

class FlightLogsController
{
    private $model;
    private $query;
    private $table= 'flight_logs';

    public function __construct()
    {
        if ($this->model == null) {
            $this->model = new Captains();
        }
        return $this->model;
    }

    public function getAll($query = "SELECT * FROM flight_logs")
    {
        $captains = $this->model->query($query);
        $captains->execute();
        return $captains->fetchAll();
    }

    public function query($query)
    {
        $this->query = $this->model->query($query);
    }

    public function execute()
    {
        $this->query->execute();
    }

    public function fetch()
    {
        return $this->query->fetchAll();
    }

    public function rowCount()
    {
        return $this->query->rowCount();
    }

    public function allCount()
    {
        $captains = $this->model->query("SELECT * FROM ".$this->table);
        $captains->execute();
        return $captains->rowCount();
    }
}