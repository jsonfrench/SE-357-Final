<?php
class BooksModel {
  public $books = array();
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localhost:8889;dbname=book_club;charset=UTF8','root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }

  public function listBooks () {

    try {
        $stmt = $this->db->query('SELECT * FROM books ORDER BY id');
        $this->books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $ex) {
        var_dump($ex->getMessage());
    }

    return $this->books;
  }

  public function listMyBooks($member_id) {
    try {
        $stmt = $this->db->prepare('SELECT * FROM books WHERE books.member_id = :member_id ORDER BY id');

        $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);

        $stmt->execute();
        $this->books = $stmt->fetchAll(PDO::FETCH_ASSOC);

      } catch (PDOException $ex) {
        var_dump($ex->getMessage());
    }

    return $this->books;
}

  // Add books method 
  public function add_book($title, $author, $description, $isbn, $cover_image, $status, $member_id) {

    try {
        $stmt = $this->db->prepare("INSERT INTO books(title,author,description,isbn,cover_image,status,member_id) VALUES(:title,:author,:description,:isbn,:cover_image,:status,:member_id)");
        
        $cover_path = '../media/covers/' . $cover_image['name'];
        move_uploaded_file($cover_image['tmp_name'], $cover_path);
        $media_path = '../media/covers/' . str_replace(' ', '%20', $cover_image['name']);

        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':isbn', $isbn, PDO::PARAM_STR);
        $stmt->bindParam(':cover_image', $media_path, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':member_id', $member_id, PDO::PARAM_STR);
      
        $stmt->execute();
        $books_id = $this->db->lastInsertId();
    
      } catch(PDOException $ex) {	  
        var_dump($ex->getMessage());
      }	  
    }

    //update books method
    public function update_book($id, $status) {

    try {
        $stmt = $this->db->prepare("UPDATE books SET status = :status WHERE books.id = :id");
  
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
  
        $stmt->execute();
    
      } catch(PDOException $ex) {	  
        var_dump($ex->getMessage());
      }	  
    }

    public function testfunc(){
      print("Testing.");
    }


}

?>