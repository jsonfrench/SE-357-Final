<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

require_once '../models/students_model.php';
require_once '../models/registrations_model.php';

$get_vars = $_GET;
$id = $get_vars["id"];

$students_model = new StudentsModel();
$findStudent = $students_model->find_student_by_id($id);
$findRegistration = $students_model->search_courses_by_student_id($id);

include_once '../views/student_view.php';

?>
