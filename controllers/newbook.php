<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

require_once '../models/books_model.php';
require_once '../models/credentials_model.php';

$books_model = new booksModel();

// var_dump($class_levels);
print_r($_GET);  
print_r($_POST);  
print_r($_FILES);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $getvars = $_GET;
   if (isset($getvars["action"]) && $getvars["action"] == 'add') {

        // print_r($_POST);  // print what got added to database
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

include '../views/newbook_view.php'
?>