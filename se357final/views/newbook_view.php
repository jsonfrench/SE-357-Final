<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>

<html><head><title>Add a New Book</title></head>
<form method="post" action="../controllers/newbook.php?action=add" enctype="multipart/form-data">
  <fieldset>
    <legend>New book:</legend>

    <!-- author 
    title 
    description
    cover -->

    <label for="title">Title: </label>
    <input type="text" id="title" name="title" value=""><br>

    <label for="author">Author: </label>
    <input type="text" id="author" name="author" value=""><br>
    
    <label for="description">Description: </label>
    <input type="text" id="description" name="description" value=""><br>
    
    <label for="isbn">ISBN: </label>
    <input type="text" id="isbn" name="isbn" value=""><br>
    
    <label for="cover_image">Cover Image: </label>
    <input type="file" accept="image/jpeg,image/png" id="cover_image" name="cover_image" value=""><br>
    
    <hr>

    <input type="reset" value="Reset">&nbsp;&nbsp;<input type="submit" value="Add" >
  </fieldset>
</form>
<p>
<a href="books.php">books List</a><br>
<a href="login.php">Log Out</a>

</html>