<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

require_once '../models/courses_model.php';
require_once '../models/students_model.php';
require_once '../models/registrations_model.php';

// $get_vars = $_GET;
// print_r($_GET);  
// print_r($_POST);  

$students_model = new StudentsModel();
$findStudent = $students_model->find_student_by_id($_GET['id']);

$courses_model = new CoursesModel();
$courses_list = $courses_model->listCourses();

$registrations_model = new RegistrationsModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'add') { // if new registration was added (can tell by url)

        //  print_r($_POST);  // print data submitted by FORM element
        $courses_id = $_POST['courses_id'];
        $students_id = $_POST['students_id'];
        $added_registration = $registrations_model->add_registration($students_id, $courses_id);

        //print_r($added_student);
        echo "registered student";
        } 
    } 

include '../views/newregistration_view.php'
?>