<?php
require_once '../models/students_model.php';

$model = new StudentsModel();

 $students_list = $model->listStudents();


require_once '../views/students_view.php';
?>
