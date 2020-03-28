<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="createUser.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username"/><br>
        <label for="pass">Password</label>
        <input type="password" name="pass"/><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
<?php
require_once 'functions/functionDb.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = ($_POST['username']);
    $pass = ($_POST['pass']);
    $con = dbCon();
    createUser($con,$user,$pass);
}

?>
</html>