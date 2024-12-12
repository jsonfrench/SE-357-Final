<?php

// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

session_start();

// print_r($_SESSION);

if (!isset($_SESSION['email'])){
    header('Location: login.php');
    exit();
}

require_once '../models/books_model.php';
require_once '../models/members_model.php';
require_once '../models/checkouts_model.php';

$books_model = new BooksModel();
$checkouts_model = new CheckOutsModel();

$books_list = $books_model->listBooks();

$members_model = new MembersModel();
$current_member = $members_model->find_member_by_email($_SESSION["email"]);
$current_member_id = $current_member["0"]["members_id"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['action'])) { 

        $book_id = $_POST['book_id'];
        $new_status = $_POST['new_status'];
        $updated_book = $books_model->update_book($book_id, $new_status); // update book status

        $member_id = $current_member["0"]["members_id"];
        $book_id = $_POST['book_id'];
        $checkout_time = date("Y-m-d-H:i:s");
        $action = $_POST['action'];

        $checkout = $checkouts_model->add_check_out($member_id, $book_id, $checkout_time, $action); // log checkout
        
        // Redirect to avoid resubmission
        header('Location: books.php');
        exit();
    }
}

function set_status($book, $has_book, $current_member_id) {
    $id = $book['id'];
    if ($book['status'] == 0 && $has_book) {
        return '<form method="post" action="../controllers/books.php?action=checkout">
            <input type="hidden" name="book_id" value="' . $id . '"> 
            <input type="hidden" name="new_status" value="' . 1 . '"> 
            <input type="hidden" name="action" value="return"> 
            <input type="submit" value="Return">
        </form>';
    } elseif ($book['status'] == 0) {
        return 'Unavailable'; 
    } elseif ($book['member_id'] == $current_member_id) {
        return 'Owned'; 
    } else {
        return '<form method="post" action="../controllers/books.php?action=checkout">
            <input type="hidden" name="book_id" value="' . $id . '">
            <input type="hidden" name="new_status" value="0">
            <input type="hidden" name="action" value="borrow">
            <input type="submit" value="Borrow">
        </form>';
    }
}

require_once '../views/navigation_view.php';
require_once '../views/books_view.php';
