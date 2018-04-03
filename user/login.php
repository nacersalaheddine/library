<!DOCTYPE html>
<?php
require_once("../inc/functions.php");
require_once("../inc/session.php");
require_once("../inc/database.php");
require_once("../inc/lecteur.php");

if($session->is_logged_in()){
  redirect_to("index.php");
}
if(isset($_POST['submit'])){

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  // echo $username.$password;
  $found_user = Lecteur::authenticate($username,$password);

  if($found_user){
    $session->login($found_user);
    redirect_to("index.php");

  }else{
    echo "wrong credentials";
  }

}


?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/float-input.css">
  <link rel="stylesheet" href="./user.css">
  <link rel="shortcut icon" href="../res/icon.png">
  <title>Library(User Login)</title>
</head>
<body>
    <form action="./login.php" method="post">
      <h1>User Login</h1>
    <div class="field">
      <input type="text" name="username" id="username" maxlength="30"  placeholder="jane.appleseed">
      <label for="username">Username</label>
    </div>
    <div class="field">
      <input type="password" name="password" id="password" maxlength="30" placeholder="password">
      <label for="password">Password</label>
    </div>

    <button id="logIn" type="submit"  name="submit">Login</button>
    <h3 id="text" style="text-align:center;margin-top:20px;"><a href="../../" style="text-decoration:none;color:orange;">back to main</a></h3>
    </form>
</body>
</html>
<?php

if(isset($db)){
  $db->close_connection();
}

?>
