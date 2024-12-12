<?php

// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['email'])){
    header('Location: login.php');
    exit();
}

require_once '../models/books_model.php';
require_once '../models/credentials_model.php';
require_once '../models/members_model.php';

$books_model = new booksModel();
$members_model = new membersModel();

// var_dump($class_levels);
// print_r($_GET);  
// print_r($_POST);  
// print_r($_FILES);
// print_r($_SESSION);
$current_member = $members_model->find_member_by_email($_SESSION["email"]);
// print_r($current_member);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $getvars = $_GET;
   if (isset($getvars["action"]) && $getvars["action"] == 'add') {

        // print_r($_POST);  // print what got added to database
        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $isbn = $_POST['isbn'];
        $cover_image = $_FILES['cover_image'];
        $status = 1; // book should be available upon uploading
        $member_id = $current_member['0']['members_id'];

        $added_book = $books_model->add_book($title, $author, $description, $isbn, $cover_image, $status, $member_id);

        //print_r($added_book);
        // echo "added book";
    }
} 

require_once '../views/navigation_view.php';
include '../views/newbook_view.php'
?>