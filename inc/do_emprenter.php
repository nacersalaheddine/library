<?php

      require_once("./database.php");
      require_once("./functions.php");
      require_once("./emprent.php");


      $emprent = new Emprent();

      if($_SERVER['REQUEST_METHOD'] == "POST"){
        $lecteur_id = $_POST['lecteur_id'];
        $livre_id =$_POST['livre_id'];
        $date = $_POST['date'];
        $emp = $emprent::emprenter($livre_id,$lecteur_id);
        if($emp){
         echo $emp;


      }else{

          echo "error";
      }


        }else{

          $db->close_connection();

        }

    ?>
