<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>

<html>
  <head>
    <title>Add a New Book</title>
    <script type="text/javascript" src="../scripts/newbook.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/newbook_style.css">
  </head>
  <div class="form-background">
    <form method="post" action="../controllers/newbook.php?action=add" enctype="multipart/form-data" onSubmit="return validateNewBook(this)">
      <!-- <legend>New book:</legend> -->

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
    </form>
</div>
</html>