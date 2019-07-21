<?php


namespace App;

use App\Model\Model;
use PDO;

class Student extends Model
{
    public $table = "students";

    public $board;

    public function find($id)
    {
        $sql = 'SELECT * FROM ' . $this->table . ' LEFT JOIN grades ON students.id = grades.student_id WHERE students.id=:student_id';

        // prepare query statement
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindParam(':student_id', $id);

        // execute query
        $stmt->execute();

        $result = $stmt->fetchAll();

        $grades = [];
        foreach ($result as $grade) {
            $grades[] = $grade['grade'];
        }

        if ($result[0]['school'] === 'CSM'){
            $board = new CSM($result[0]['id'], $grades, $result[0]['name']);
        }
        else {
            $board = new CSMB($result[0]['id'], $grades, $result[0]['name']);
        }

        return $board->export();

//        $result = new \stdClass();
//        $result->id = $stmt->id;
//        $result->name = $stmt->name;
//        $result->board = new CSM()
//
//
//        return $stmt;
    }
}