<!DOCTYPE html>
<?php
require_once("../inc/functions.php");
require_once("../inc/session.php");

if(!$session->is_logged_in()){
  redirect_to("./login.php");
}
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
    {
        logout();
    }
    function logout()
    {
      global $session;
      $session->logout();
      redirect_to("login.php");


    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $session->user_id ?></title>
    <link rel="stylesheet" href="./user.css">
    <link rel="stylesheet" href="./nav-menu.css">
    <link rel="shortcut icon" href="../res/icon.png">
    <script src="./user.js"></script>
</head>
<style>

img{
  border-radius: 50%;
  width:50px;
  height:50px;
}
#logout{
  width:100px;
  margin-top:8px;
  float:right;
  border:none;
  border-radius:10px;
  margin-right:5px;
  background-color:#333;
  cursor:pointer;
  height:35px;
  color:white;
}
</style>
<body>

    <div class="topnav" id="menu">
        <a href="#" class="icon">&#9776;</a>
        <a href="./" class="active"><img src="./res/img_avatar.png" alt="Avatar"></a>
        <a href="./books.php"><i class="fa fa-book"></i>&nbsp;&nbsp;User full name</a>

        <a href="./help.php"><i class="fa fa-question"></i>&nbsp;&nbsp;MyBooKs</a>
        <a href="./about.php"><i class="fa fa-align-center"></i>&nbsp;&nbsp;Available Books</a>
        <form action="index.php" method="post" style="display:inline;">
            <input type="submit" name="logout" value="LogOut" id="logout"/>
        </form>

    </div>





</body>
</html>
