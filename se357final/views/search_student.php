<html>
<head>Students Search</head>
<body>
<form method="post" action=searchForStudent.php>
<p>Please select Class Level:</p>
    <?php
      foreach ($class_levels as $class_level) {
        $id = $class_level['id'];
        $class_level_desc = $class_level['class_level'];
        $radio_html = <<<RADIO
        <input type="radio" id="$class_level_desc" name="class_level" value="$id">
        <label for="$class_level_desc">$class_level_desc</label>&nbsp;&nbsp;
RADIO;
        echo $radio_html;
      }

    ?>

<br/><input type="reset" value="Reset">&nbsp;&nbsp;<input type="submit" value="Search">
</form>
<a href="login.php">Log Out</a>

</body>
</hmtl>