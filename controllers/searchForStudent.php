<?php

require_once '../models/students_model.php';
require_once '../models/class_levels_model.php';

$model = new StudentsModel();
$class_levels_model = new ClassLevelsModel();

$class_levels = $class_levels_model->listClassLevels();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_level = $_POST['class_level'];
    $students_list = $model->search_students_by_class_level($class_level);
} 

include '../views/students_view.php'
?>