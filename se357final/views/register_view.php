<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>

<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/register_style.css">
    <script type="text/javascript" src="../scripts/register.js"></script>
    </head>
<form method="post" action="../controllers/register.php?action=add" onSubmit="return validateRegister(this)">
  <fieldset>
    <legend>New Member:</legend>

    <label for="name">Name: </label>
    <input type="text" id="name" name="name" value=""><br>

    <label for="address">Address: </label>
    <input type="text" name="address" value=""><br>

    <label for="phone_number">Phone Number: </label>
    <input type="text" name="phone_number" value=""><br> 

    <label for="email">Email: </label>
    <input type="text" name="email" value=""><br>
    
    <label for="password">Password: </label>
    <input type="password" name="password" value=""><br>
    
    <hr>

    <input type="reset" value="Reset">&nbsp;&nbsp;<input type="submit" value="Add">
  </fieldset>
</form>
<a href="login.php">Back to Login</a>

</html>