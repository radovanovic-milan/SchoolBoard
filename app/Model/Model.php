<?php


namespace App\Model;


use App\Database\MySQL;

class Model
{
    protected $db;
    public $table;

    public function __construct()
    {
        $this->db = new MySQL();
    }

    public function all()
    {
        $sql = "SELECT * FROM " . $this->table;
        $smtp = $this->db->connect()->prepare($sql);
        $smtp->execute();

        return $smtp->fetchAll();
    }
}