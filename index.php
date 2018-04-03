<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once("./inc/head.php");
require_once('./inc/functions.php');
require_once('./inc/database.php');
?>

</head>
<body>


    <div class="topnav" id="menu">
        <a href="#" class="icon">&#9776;</a>
        <a href="./" class="active"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
        <a href="./books.php"><i class="fa fa-book"></i>&nbsp;&nbsp;Books</a>
        <a href="./user"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp;logIn</a>
        <a href="./help.php"><i class="fa fa-question"></i>&nbsp;&nbsp;Help</a>
        <a href="./about.php"><i class="fa fa-align-center"></i>&nbsp;&nbsp;about</a>
        <a href="./" id="logo">LOGO</a>

    </div>

            <p>
                <?php

                /*
                 $lect1 = Lecteur::find_by_id(2);
                $lect2 = Lecteur::find_all("select * from lecteurs;");
                /*creation of the user object*/
                    /*
                echo '<h1>'.$lect1->full_name().'</h1>';
                echo '<h1>'.$lect2[0]->full_name().'</h1>';
                */


              ?>
            </p>


   <header>


   </header>
   <section>
     <h1>Welcome to The Library</h1>
    <img src="./res/welcomBook.png" alt="">
   </section>



 <?php
    include "./inc/footer.php";
 ?>

</body>
</html>
