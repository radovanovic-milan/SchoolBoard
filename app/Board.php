<?php


namespace App;


abstract class Board
{
    public $student_id;
    public $grades;
    public $name;

    public function __construct($student_id, $grades, $name)
    {
        $this->grades = $grades;
        $this->name = $name;
        $this->student_id = $student_id;
    }

    abstract public function checkPass();

    abstract public function export();
}