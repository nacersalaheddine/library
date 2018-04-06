<!DOCTYPE html>
<?php
require_once("../inc/functions.php");
require_once("../inc/session.php");
require_once("../inc/lecteur.php");
require_once("../inc/livre.php");
require_once("../inc/emprent.php");
if(!$session->is_logged_in()){
  redirect_to("./login.php");
}

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout'])){
        logout();
    }
    function logout(){
      global $session;
      $session->logout();
      redirect_to("login.php");


    }


    $id = $session->user_id;
    $lecteur = Lecteur::find_by_id($id);




?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $lecteur->full_name(); ?></title>
    <link rel="stylesheet" href="./user.css">
    <link rel="shortcut icon" href="../res/icon.png">
    <link rel="stylesheet" href="./nav-menu.css">
    <link rel="stylesheet" href="../css/book-card.css">
    <script src="./user.js"></script>
    <script src="../js/jquery/jquery-2.1.3.min.js"></script>
</head>
<style>

img#avatar{
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

section img {
    width: 350px;
    height: 200px;
    float: right;
}
</style>
<body>

    <div class="topnav" id="menu">
        <a href="#" class="icon">&#9776;</a>
        <a href="./" class="active"><img id="avatar" src="./res/img_avatar.png" alt="Avatar"></a>
        <a href="./"><i class="fa fa-book"></i>&nbsp;&nbsp;<?php echo $lecteur->full_name();?></a>
        <a href="./"><i class="fa fa-align-center"></i>&nbsp;&nbsp;Available Books</a>
        <a href="./mybooks.php"><i class="fa fa-question"></i>&nbsp;&nbsp;MyBooKs</a>

        <form action="index.php" method="post" style="display:inline;">
            <input type="submit" name="logout" value="LogOut" id="logout"/>
        </form>



    </div>
    <section>
      <h1>Emprented BOOKS</h1>
      <div class="card-container" id="books-container">
      </div>

    </section>


    <script>




    ($(document).ready(function () {


    var $loader = $("#l-oader");
    var $input = $(".form-control");
    load_more_books();




    function load_more_books(){
      $.post("../inc/load_emprenter.php",{
        limit:10
       },
       function(data, status){
          $loader.removeClass("loader");
          $("#books-container").append(data);

       });
       $loader.addClass("loader");
    }

    }));

    </script>

</body>
</html>
