<!DOCTYPE html>
<?php
require_once("../inc/functions.php");
require_once("../inc/session.php");
require_once("../inc/admin.php");
if(!$session->is_logged_in()){
  redirect_to("./login.php");
}

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

    //echo $session->user_id."(Admin)" ;
    $id = $session->user_id;
    $admin = Admin::find_by_id($id);

  ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $session->user_id."(Admin)" ?></title>
    <link rel="stylesheet" href="./admin.css">
    <link rel="shortcut icon" href="../res/icon.png">
    <link rel="stylesheet" href="./nav-menu.css">
    <script src="./admin.js"></script>
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
        color:white;
        height:35px;
      }
    </style>
    </head>

<body>


    <div class="topnav" id="menu">
        <a href="#" class="icon">&#9776;</a>
        <a href="./" class="active"><img src="./res/img_avatar.png" alt="Avatar"></a>
        <a href="./books.php"><i class="fa fa-book"></i>&nbsp;&nbsp;
        <?php
          echo $admin->full_name();
        ?>
        </a>
        <a href="./help.php"><i class="fa fa-question"></i>&nbsp;&nbsp;Users</a>
        <a href="./about.php"><i class="fa fa-align-center"></i>&nbsp;&nbsp;Books</a>
        <form action="index.php" method="post" style="display:inline;">
            <input type="submit" name="logout" value="LogOut" id="logout"/>
        </form>
<!--
        <a href="./" id="logo">LogOut</a>
 -->
    </div>



</body>
</html>
