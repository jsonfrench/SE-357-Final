<?php

// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

session_start();

require_once '../models/credentials_model.php';

$message = "Please enter your login credentials";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $getvars = $_GET;

    if (isset($getvars["action"]) && $getvars["action"] == 'login') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $model = new CredentialsModel();
        $validLogin = $model->verify_login($email, $password);

        if ($validLogin == 1) {
            // echo "valid login";

            $_SESSION['email'] = $email;

            header('Location: books.php');
        } else {
            // echo "invalid";
            $message = "Entered email and/or password is invalid";
        }

        }
}

include '../views/login_view.php'

?>
