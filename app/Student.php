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
        $sql = 'SELECT students.id as id, students.name as name, school, grade FROM ' . $this->table . ' 
            LEFT JOIN grades ON students.id = grades.student_id 
            WHERE students.id=:student_id 
            ';

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

        $student = new \stdClass();
        $student->id = $result[0]['id'];
        $student->name = $result[0]['name'];
        $student->board = $result[0]['school'] === 'CSM'
            ? new CSM($result[0]['id'], $grades, $result[0]['name'])
            : new CSMB($result[0]['id'], $grades, $result[0]['name']);

        return $student;
    }
}