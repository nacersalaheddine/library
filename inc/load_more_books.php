<?php

      require_once("./database.php");
      require_once("./functions.php");
      require_once("./livre.php");

      $livre = new Livre();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $livres = $livre::find_by_range(($_POST['limit']));
      if($livres){
        foreach($livres as $i){
          echo '<div class="card">'.'
          <img src="./user/res/book-res/cover ('.$i->img.').jpg" alt="'.$i->img.' IMAGE" style="width:100%">
          <div class="container">
            <h4><b>'.$i->title.'</b></h4>
            <p>Description :'.$i->description.'</p>
          </div>
          </div>';
        }
      }else{

        $db->close_connection();

      }


    }
    ?>
