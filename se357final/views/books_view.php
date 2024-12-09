<html>
<head>
<title>Books Club Books</title>
</head>
<body>
<h1>Books List</h1>
<p><a href="newbook.php">Add book</a>
    <table border="1">
    <tr><th>Cover</th><th>Title</th><th>Author</th><th>Description</th><th>Check Out?</th></tr>
<?php
  foreach ($books_list as $book) {
    $id = $book['id'];
    $status_msg = ($book['status'] == 1)? 'available' : 'unavailable'; // writes status message depending on value of status
    if ($book['status'] == 1) {
      $status_msg = 'available'
    } else {
      $status_msg = 'unavailable'; // writes status message depending on value of status
    }    echo 
    '<tr>' .
    '<td>' . '<img src=' . $book['cover_image'] . ' width=100 height=auto alt="cover image"></img>' . '</td>' . 
    '<td>' . $book['author'] . '</td>' .
    '<td>' . $book['title'] .  '</td>' . 
    '<td>' . $book['description'] .  '</td>' . 
    '<td><form method="post">' . $status_msg . '</form></td>' . // check ownerships and change value depending on if statement
    '</tr>'
    ;
  }
?>

<form method="post" action="../controllers/books.php?action=test">
    <input type="submit" value="Test"> <br>
</form>


</table>
<p><a href="students.php">Students List</a><br>
<a href="login.php">Log Out</a>
</body>
</hmtl>