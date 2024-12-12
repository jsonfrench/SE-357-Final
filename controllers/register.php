<?php

// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

require_once '../models/members_model.php';
require_once '../models/credentials_model.php';

$members_model = new MembersModel();
$credentials_model = new CredentialsModel();

// var_dump($class_levels);

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $getvars = $_GET;
   if (isset($getvars["action"]) && $getvars["action"] == 'add') {

        // print_r($_POST);  // print what got added to database
        // call the model method to insert the member
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $added_member = $members_model->add_member($name, $address, $phone_number, $email, $password);

        //print_r($added_member);
        // echo "added member";
        $message = 'added member';
    }
} 

include '../views/register_view.php'
?>