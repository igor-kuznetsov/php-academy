<?php

class Model
{
    protected $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = App::getDb();
    }
}