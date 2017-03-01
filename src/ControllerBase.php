<?php

abstract class ControllerBase
{
    protected $view;
    protected $model;
    protected $provider;
    protected $db;

    public function __construct($provider)
    {
        $this->provider = $provider;
        $this->view = new View();
        $this->db = new DataBase($this->provider['database']);
        $model = preg_replace('/Controller/', 'Model', get_class($this));
        if (class_exists($model)) {
            $this->model = new $model($this->db);
        }
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}
