<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>

<html>
<head><title>Students Info</title></head>
<body>
  <h1>Student Info</h1>
  <p>
    <?php echo $findStudent[0]['first_name']; ?><br>
    <a href="students.php">Students List<br></a>
    <?php echo '<a href=newregistration.php?id=' . $findStudent[0]['id'] . '>Register For Course </a>';?><br>
  </p>
  <table border="1">
    <tr><th>Course Id</th><th>Course Number</th><th>Description</th></tr>
<?php
  foreach ($findRegistration as $registration) {
    echo '<tr><td>' . $registration['course_id'] . '</td><td>' . $registration['course_number'] . 
    '</td><td>' . $registration['course_description'] . '</td></tr>';
  }

?>
</table>
<a href="login.php">Log Out</a>
</body>
</hmtl>