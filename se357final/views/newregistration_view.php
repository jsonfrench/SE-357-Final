<html>
  <head>
    <title>Register For a Course</title>
  </head>
  <body>
    <form method="post" action='../controllers/newregistration.php?action=add&id=<?php echo $findStudent[0]['id'] ?>'>
    <fieldset>
      <h1>Register for a Course</h1>
        <p> Student: <?php echo $findStudent[0]['first_name']; ?></p>
        <p>Select Course: 
          <select name="courses_id" id="courses_id">
          <?php
            foreach ($courses_list as $course) {
              $id = $course['id'];
              echo '<option value=' . $id . '>' . $course['course_number'] . $course['course_description'] .  '</option>';
            }
          ?>       
          </select>
        </p>
        <hr>
        <input type="submit" value="Register"><br> 
        <input type="hidden" name="students_id" value="<?php echo $findStudent[0]['id'];?>"> 
        <a href="courses.php">Courses List</a><br>
        <a href="students.php">Students List</a><br>
        <a href="login.php">Log Out</a>
        </fieldset>
    </form>
  </body>
</html>