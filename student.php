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

        <title>Student</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template-->
        <link href="assets/css/custom.css" rel="stylesheet">

    </head>

    <body class="bg-secondary">

    <div class="container" style="margin-top: 50px;">
        <?php  if (isset($_GET['student_id']) && !empty($_GET['student_id'])) : ?>
            <?php $student = new Student(); ?>

            <?php $student = $student->find($_GET['student_id']); ?>
            <?php echo $student->board->export(); ?>
        <?php else: ?>
            <p>Invalid student.</p>
        <?php endif ?>
    </div>

    </body>
    </html>

