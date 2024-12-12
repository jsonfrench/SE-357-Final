  <html>
  <head>
    <title>Books Club Books</title>
    <link rel="stylesheet" type="text/css" href="../css/books_style.css">
  </head> 
  <body>
  <h1>Books List</h1>
      <table border="1">
      <tr><th>Cover</th><th>Title</th><th>Author</th><th>Description</th><th>Check Out?</th></tr>
      <?php
        foreach ($books_list as $book) {

          $id = $book['id'];
          $has_book = $current_member_id == $checkouts_model->get_last_borrower_of_book($id)['member_id']; // this gives an error if the book has never been borrowed but the website functions just fine anyway
          $status_msg = set_status($book, $has_book, $current_member_id);
      
          echo 
          '<tr>' .
          '<td>' . '<img src=' . $book['cover_image'] . ' width=100 height=auto alt="cover image"></img>' . '</td>' . 
          '<td>' . $book['title'] . '</td>' .
          '<td>' . $book['author'] .  '</td>' . 
          '<td>' . $book['description'] .  '</td>' . 
          '<td><form method="post">' . $status_msg . '</form></td>' . // check ownerships and change value depending on if statement
          '</tr>'
          ;
        }
      ?>

  </table>
  </body>
  </hmtl>