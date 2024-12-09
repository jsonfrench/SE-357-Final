<?php
class RegistrationsModel {
  public $registrations = array();
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localhost:8889;dbname=book_club;charset=UTF8','root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }

  public function listRegistrations () {

    try {
        $stmt = $this->db->query('SELECT * FROM registrations ORDER BY id');
        $this->registrations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $ex) {
        var_dump($ex->getMessage());
    }

    return $this->registrations;
  }

  public function find_registration_by_id($students_id) {
    try {
     $stmt = $this->db->prepare('SELECT * FROM registrations where students_id=:students_id');
     $stmt->bindParam(':students_id', $students_id, PDO::PARAM_INT);
     $stmt->execute();
     $registration = $stmt->fetchAll(PDO::FETCH_ASSOC);
     return $registration;
   }
    catch(PDOException $ex) {
      var_dump($ex->getMessage());
    }
}

  // Add student method 
  public function add_registration($students_id, $courses_id) {

    try {
        $stmt = $this->db->prepare("INSERT INTO registrations(students_id,courses_id) VALUES(:students_id,:courses_id)");

        $stmt->bindParam(':students_id', $students_id, PDO::PARAM_STR);
        $stmt->bindParam(':courses_id', $courses_id, PDO::PARAM_STR);

        $stmt->execute();
        $registration_id = $this->db->lastInsertId();

    } catch(PDOException $ex) {	  
        var_dump($ex->getMessage());
    }	
}

}

?>