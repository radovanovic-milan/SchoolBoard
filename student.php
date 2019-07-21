<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Student;

$student = new Student();

print_r($student->find($_GET['student_id']));