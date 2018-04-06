<?php

//select id_livre,date_emprent,date_ret  from emprent where id_lecteur = 1;

require_once("./database.php");
require_once("./functions.php");
require_once("./livre.php");
require_once("./emprent.php");
require_once("../inc/session.php");
$livre = new Livre();
$emprent = new Emprent();

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $sql = 'select id_livre,date_emprent,date_ret  from emprent where id_lecteur = '.$session->user_id.';';
  //$livres = $livre::find_by_range(($_POST['limit']));
  $emprents = $emprent::find_by_sql($sql);


  if($emprents){
  foreach($emprents as $i){
    $liv = $livre::find_by_id($i->id_livre);
   // echo "<h1>".$i->date_emprent."</h1>";
    echo '<div class="card">'.'
    <img src="./res/book-res/cover ('.$liv->img.').jpg" alt="'.'$i->img'.' IMAGE" style="width:100%">
    <div class="container">
      <h4>Title:<b>'.$liv->title.'</b></h4>
      <h4><b>NO EXemplair:'.$liv->nbr_exemplairs.'</b></h4>
      <p><h4>Description </h4>:'.$liv->description.'</p>
      <h4 style="color:blue">Date Emprenter :'.$i->date_emprent.'</h4>
      <h4 style="color:red">Date De Reteur :'.$i->date_ret.'</h4>
    </div>

    </div>';
  }
  }else{
    $db->close_connection();

  }
/*
  if($livres){
    foreach($livres as $i){
      $dis = ($i->nbr_exemplairs==0)?"DISABLED":"";
      echo '<div class="card">'.'
      <img src="./res/book-res/cover ('.$i->img.').jpg" alt="'.$i->img.' IMAGE" style="width:100%">
      <div class="container">
        <h4><b>'.$i->title.'</b></h4>
        <h4><b>NO EXemplair:'.$i->nbr_exemplairs.'</b></h4>
        <p>Description :'.$i->description.'</p>
        <button id="emp" '.$dis.' onclick="do_emprenter('.$i->id.')">Embrenter</button>
      </div>

      </div>';
    }
  }else{

    $db->close_connection();

  }
*/


}



?>
