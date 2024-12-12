<html>
<head>
  <title>My Books</title>
  <link rel="stylesheet" type="text/css" href="../css/books_style.css">
</head>
<body>
<h1>My Books</h1>
    <table border="1">
    <tr><th>Cover</th><th>Title</th><th>Author</th><th>Description</th></tr>
    <?php
      foreach ($books_list as $book) {
        $id = $book['id'];

        echo 
        '<tr>' .
        '<td>' . '<img src=' . $book['cover_image'] . ' width=100 height=auto alt="cover image"></img>' . '</td>' . 
        '<td>' . $book['author'] . '</td>' .
        '<td>' . $book['title'] .  '</td>' . 
        '<td>' . $book['description'] .  '</td>' . 
        '</tr>'
        ;
      }
    ?>

</table>
</body>
</hmtl>