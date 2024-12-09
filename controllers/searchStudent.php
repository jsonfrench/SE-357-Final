<?php
require_once '../models/class_levels_model.php';

$class_levels_model = new ClassLevelsModel();
$class_levels = $class_levels_model->listClassLevels();


require_once '../views/search_student.php';
?>

