<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>

<html>
    <head>
        <title>Login</title>
        <script type="text/javascript" src="../scripts/login.js"></script>
    </head>

<form method="post" action="../controllers/login.php?action=login" onSubmit="return validateLogin(this)">

<fieldset>
    <legend>Login:</legend>
    <label for="email">EMail: </label>
    <input type="text" id="email" name="email" value="" size="64"><br>
    <label for="password">Password: </label>
    <input type="password" name="password" value=""><br>
    <p><?= $message; ?> <br><br>
    <input type="reset" value="Reset">&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Login"> <br>
    <p>New user? <a href="register.php">Register here.</a></p>
</fieldset>
</form>

</html>