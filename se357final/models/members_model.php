<?php
class MembersModel {
  public $members = array();
  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localhost:8889;dbname=book_club;charset=UTF8','root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }

  // Add member method 
  public function add_member($name, $address, $phone_number, $email, $password) {

	try {
			$stmt = $this->db->prepare("INSERT INTO members(name,address,phone_number) VALUES(:name,:address,:phone_number)");

			$stmt->bindParam(':name', $name, PDO::PARAM_STR);
			$stmt->bindParam(':address', $address, PDO::PARAM_STR);
			$stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);

			$stmt->execute();
			$members_id = $this->db->lastInsertId();

			$credentials_model = new CredentialsModel();
			$credentials_model->add_credential($email, $password, $members_id);

		} catch(PDOException $ex) {	  
			var_dump($ex->getMessage());
	  	}	
  }


public function verify_login($email, $pwd) {
	try {
		$stmt = $this->db->prepare('SELECT * FROM members where email =:email AND pwd=CONCAT("*", UPPER(SHA1(UNHEX(SHA1(:pwd))))) ');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':pwd', $pwd, PDO::PARAM_STR);
	  	$stmt->execute();
	  	$found_member = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return true;
		// return sizeof($found_member);
	  } catch(PDOException $ex) {
		 var_dump($ex->getMessage());
	  }

}

public function listMembers () {

  try {
//    $stmt = $this->db->query('SELECT s.*, cl.class_level as class_level_desc FROM members s JOIN class_levels cl on s.class_level=cl.id');

    $stmt = $this->db->query('SELECT *  FROM members');


	$this->members = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) {
     var_dump($ex->getMessage());
   }
 
   return $this->members;
}
    
public function find_member_by_id($id) {
	try {
	 $stmt = $this->db->prepare('SELECT * FROM members where id=:id');
	 $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	 $stmt->execute();
	 $member = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 return $member;
   }
	catch(PDOException $ex) {
	  var_dump($ex->getMessage());
	}
}

public function find_member_by_email($email) {
	try {
	 $stmt = $this->db->prepare('SELECT * FROM credentials where email=:email');
	 $stmt->bindParam(':email', $email, PDO::PARAM_INT);
	 $stmt->execute();
	 $member = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 return $member;
   }
	catch(PDOException $ex) {
	  var_dump($ex->getMessage());
	}
}

public function search_courses_by_member_id ($member_id) {
	
	try {

	  $stmt = $this->db->prepare('SELECT 
									c.id AS course_id, 
									c.course_number, 
									c.course_description
								FROM 
									registrations r
								JOIN 
									courses c ON r.courses_id = c.id
								WHERE 
									r.members_id = :member_id;
								');
	  $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
	  $stmt->execute();
	  $found_courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  return $found_courses;
	
	} catch(PDOException $ex) {
	  
	  var_dump($ex->getMessage());
	}
  
}

}

?>
