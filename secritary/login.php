<!DOCTYPE html>
<?php
require_once("../inc/functions.php");
require_once("../inc/session.php");
require_once("../inc/database.php");
require_once("../inc/admin.php");

if($session->is_logged_in()){
  redirect_to("index.php");
}
if(isset($_POST['submit-admin'])){

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  // echo $username.$password;
  $found_user = Admin::authenticate($username,$password);

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
  <link rel="stylesheet" href="./admin.css">
  <link rel="shortcut icon" href="../res/icon.png">
  <title>Library(User Login)</title>
</head>
<body>


<form id="admin-form" action="./login.php" method="post">

    <h1>Admin LogIn</h1>

    <div class="info">
      <p><input type="text" name="username" placeholder="Username..." oninput="this.className = ''"></p>
      <p><input type="password" name="password" placeholder="Password..." oninput="this.className = ''"></p>
    </div>


      <div>
        <button type="submit" id="logIn" name="submit-admin">logIn</button>
      </div>


    <!-- loader -->
    <div style="text-align:center;margin-top:40px;">
      <span class="loader"></span>
    </div>

</form>




</body>
</html>
<?php

if(isset($db)){
  $db->close_connection();
}

?>
