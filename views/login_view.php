<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>

<html>
    <head>
        <title>Login</title>
        <script type="text/javascript" src="../scripts/login.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/register_style.css">
    </head>

<div class="form-background">
<form method="post" action="../controllers/login.php?action=login" onSubmit="return validateLogin(this)">
    <legend>Login:</legend>
    <label for="email">EMail: </label>
    <input type="text" id="email" name="email" value="" size="64"><br>
    <label for="password">Password: </label>
    <input type="password" name="password" value=""><br>
    <p><?= $message; ?> <br><br>
    <input type="reset" value="Reset">&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Login"> <br>
</form>
<p>New user? <a href="register.php">Register here.</a></p>
</div>

</html>