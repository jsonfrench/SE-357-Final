<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

session_start();

require_once '../models/books_model.php';
require_once '../models/members_model.php';

$books_model = new BooksModel();

$books_list = $books_model->listBooks();

print_r($_SESSION);

$members_model = new MembersModel();
$current_member = $members_model->find_member_by_email($_SESSION["email"]);

print_r($current_member);
print("Members id: " . $current_member["0"]["members_id"]);

/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
 
         print_r($_POST);  // print what got added to database
         // call the model method to insert the book
         $title = $_POST['title'];
         $author = $_POST['author'];
         $description = $_POST['description'];
         $isbn = $_POST['isbn'];
         // $cover_image = '../media/covers/' . $_FILES['cover_image']['name'];
         $cover_image = $_FILES['cover_image'];
 
         $added_book = $books_model->add_book($title, $author, $description, $isbn, $cover_image, 1);
 
         //print_r($added_book);
         echo "added book";
     }
 }  
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $added_book = $books_model->testfunc();
    // $getvars = $_GET;
    // if (isset($getvars["action"]) && $getvars["action"] == 'test') {
 
    //      print_r($_POST);  // print what got added to database
    //      // call the model method to insert the book
    //      $added_book = $books_model->testfunc();
 
    //      //print_r($added_book);
    //  }
 }  

require_once '../views/books_view.php';
?>
