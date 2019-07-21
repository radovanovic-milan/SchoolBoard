<?php


namespace App;

use App\Model\Model;
use PDO;

class Student extends Model
{
    public $table = "students";

    public $board;

    /**
     * User constructor.
     * @param PDO $db
     */
    public function __construct()
    {
    }

    public function find($id)
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id=:student_id LEFT JOIN grades ON student.id = grades.student_id';

        // prepare query statement
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);

        // execute query
        $stmt->execute();

        if ($stmt->school === 'CSM'){
            $board = new CSM($stmt->id, $stmt->grades, $stmt->name);
        }
        else {
            $board = new CSMB($stmt->id, $stmt->grades, $stmt->name);
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