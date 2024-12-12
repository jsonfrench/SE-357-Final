<?php

// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['email'])){
    header('Location: login.php');
    exit();
}

require_once '../models/books_model.php';
require_once '../models/members_model.php';
require_once '../models/checkouts_model.php';

$books_model = new BooksModel();
$checkouts_model = new CheckOutsModel();

$members_model = new MembersModel();
$current_member = $members_model->find_member_by_email($_SESSION["email"]);
$current_member_id = $current_member["0"]["members_id"];

$books_list = $books_model->listMyBooks($current_member_id);

// print_r($current_member);
// print("Members id: " . $current_member["0"]["members_id"]);

require_once '../views/navigation_view.php';
require_once '../views/mybooks_view.php';
?>
