<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Database\MySQL;

print_r(MySQL::connect());die;

use App\Student;

$student = new Student();

$students = $student->all();

echo "<ul>";

foreach ($students as $student){
    echo "<li><a href='/student.php?student_id='". $student->id . ">" . $student->name . "</a>";
}