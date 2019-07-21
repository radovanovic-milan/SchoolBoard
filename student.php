<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Student;

$student = new Student();

echo $student->find($_GET['student_id']);