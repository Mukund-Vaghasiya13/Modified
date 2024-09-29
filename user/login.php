<?php
include("../DatabaseConnectivity/DbConfig.php");
if (session_status() === PHP_SESSION_NONE) {
  session_start(); // Start the session only if it hasn't been started
}
$tablename = "users";
$createtable = "CREATE TABLE IF NOT EXISTS $tablename (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    userType VARCHAR(255) NOT NULL,
    address VARCHAR(255), 
    PRIMARY KEY (id)
);";

$result = $con->query($createtable);
if (!$result) {
    die("<h6>Error to create table<h6>");
}
$error_Message = "";
if (isset($_POST["submit"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        $error_Message = "Details are empty";
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        $result = $con->query(($query));
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $usertype = $row["userType"];
            $userid = $row["id"];
            if($usertype == "user"){
            $_SESSION["User"]['username'] =  $_POST["username"];
            $_SESSION["User"]['loggedin'] = true;
            $_SESSION["User"]['user'] = $usertype;
            $_SESSION["User"]['user_id'] = $userid;
            header("Location: " . "index.php");
            }
        } else {
            $error_Message = "Invalid user";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../styleSheetGroup/stylesheet.css">
</head>

<body>
  <div class="container">
    <div class="head-view">
      <img src="../uploads/assets/Atlas.svg"/>
      <h1>Login</h1>
    </div>
    <form action="login.php" method="POST">
      <input type="text" placeholder="Username" name="username" required>
      <input type="password" placeholder="Password" name="password" required>
      <button type="submit" name="submit">Login</button><br>
      <a href="sinup.php">Sinup</a>
    </form>
    <p class="Error"><?php echo $error_Message; ?></p>
  </div>
</body>
</html>
