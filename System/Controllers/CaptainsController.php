<?php

namespace MD\Controllers;

use MD\Models\Captains;

class CaptainsController
{
    private $model;
    private $query;

    public function __construct()
    {
        if ($this->model == null) {
            $this->model = new Captains();
        }
        return $this->model;
    }

    public function getAll($query = "SELECT * FROM users")
    {
        $captains = $this->model->query($query);
        $captains->execute();
        return $captains->fetchAll();
    }

    public function getById($id){
        $captains = $this->model->query("SELECT * FROM captains WHERE id = :id");
        $captains->execute(array(':id' => $id));
        return $captains->fetch();
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
        $captains = $this->model->query("SELECT * FROM users");
        $captains->execute();
        return $captains->rowCount();
    }
}