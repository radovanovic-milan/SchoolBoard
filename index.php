<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Student;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="assets/css/custom.css" rel="stylesheet">

</head>

<body class="bg-secondary">

<div class="container" style="margin-top: 50px;">
    <?php $student = new Student(); ?>
    <?php $students = $student->all(); ?>
    <ul>
        <?php foreach ($students as $student): ?>
        <li>
            <a href='student.php?student_id= <?php echo $student['id'] ?> '> <?php echo $student['name'] ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>