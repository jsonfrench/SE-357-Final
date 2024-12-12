<?php
class CheckOutsModel {
  public $checkouts = array();
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localhost:8889;dbname=book_club;charset=UTF8','root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }

  public function list_checkouts () {

    try {
        $stmt = $this->db->query('SELECT * FROM checkouts ORDER BY id');
        $this->checkouts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $ex) {
        var_dump($ex->getMessage());
    }

    return $this->checkouts;
  }

  // Add checkouts method 
  public function add_check_out($member_id, $book_id, $checkout_time, $action) {

    try {
        $stmt = $this->db->prepare("INSERT INTO checkouts(member_id,book_id,checkout_time,action) VALUES(:member_id,:book_id,:checkout_time,:action)");
  
        $stmt->bindParam(':member_id', $member_id, PDO::PARAM_STR);
        $stmt->bindParam(':book_id', $book_id, PDO::PARAM_STR);
        $stmt->bindParam(':checkout_time', $checkout_time, PDO::PARAM_STR);
        $stmt->bindParam(':action', $action, PDO::PARAM_STR);
  
        $stmt->execute();
        $checkouts_id = $this->db->lastInsertId();
    
      } catch(PDOException $ex) {	  
        var_dump($ex->getMessage());
      }	  
    }

    public function get_last_borrower_of_book($book_id) {
      try {
          // Use prepare and bindParam for parameterized queries
          $stmt = $this->db->prepare('SELECT member_id FROM checkouts WHERE book_id = :book_id ORDER BY checkout_time DESC LIMIT 1');
          $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT); // Bind the parameter
          $stmt->execute();
          $borrower = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the single row
      } catch(PDOException $ex) {
          var_dump($ex->getMessage());
          return null;
      }
      return $borrower;
  }
  
  
}

?>