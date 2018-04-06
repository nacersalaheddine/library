<?php
require_once("database.php");
require_once("livre.php");


 class Emprent{

  public  $id;
  public  $id_lecteur;
  public  $date_emprent;
  public  $id_livre;
  public  $date_ret;

  private  static $table_name = "emprent";


  public static function emprenter($id_livre,$id_lect){
    global $db;

      $emprented = self::check_emprented($id_livre);//returns true or false if the book exists or no

      if(isset($id_livre)&&isset($id_lect)&& $emprented){

        $ree = Livre::emprent($id_lect,$id_livre);

        $sql =  'UPDATE livres SET nbr_exemplairs = nbr_exemplairs - 1 WHERE id = '.$id_livre.' && nbr_exemplairs > 0;';
        $result = $db->query($sql);

        return "EMPRENTED ".$emprented;

       // return $row['nbr_exemplairs'];
      }else{
        return "Error ";
      }


  }
  public static function check_emprented($id_livre){
    $sql_check_emprented = 'select * from emprent where id_livre = '.$id_livre;
    $result_array = self::find_by_sql($sql_check_emprented);
    return empty($result_array);
  }

  public static function find_all(){
      $sql  = "SELECT * FROM ".self::$table_name;
      return self::find_by_sql($sql);
  }
  public static function find_by_id($id = 0){
      global $db;
      $sql  = "SELECT * FROM ".self::$table_name." WHERE id = {$id} LIMIT 1;";
      $result_array = self::find_by_sql($sql);

      return !empty($result_array) ? array_shift($result_array) : false;

  }


  public static function find_by_range($limit=10,$increment=10){
     global $db;
     if( self::get_count_of_books() > $limit){
      $sql  = "SELECT * FROM ".self::$table_name." WHERE id > ".($limit-$increment);
      $sql .= " && id <= {$limit}";
      $result_array = self::find_by_sql($sql);
      return !empty($result_array) ? $result_array : false;
     }else{
       return false;
     }


  }
  public static function find_by_sql($sql=""){
      global $db;
      $result_set = $db->query($sql);
      $object_array = array();

      while($row = $db->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
      }
      return $object_array;
  }
  private static function instantiate($record){

      $object = new Self;
      foreach($record as $attribute=>$value){
          if($object->has_attribute($attribute)) {
          $object->$attribute = $value;
          }
      }
      return $object;
  }
  private function has_attribute($attribute) {
      $object_vars = get_object_vars($this);
      return array_key_exists($attribute, $object_vars);
  }

  public static function search($key_word){
   $sql_search = "select * from ".self::$table_name." where title like '%{$key_word}%' limit 10";
   $result_array = self::find_by_sql($sql_search);
   return !empty($result_array) ? $result_array : false;
  }



public function create() {
  global $database;
  // Don't forget your SQL syntax and good habits:
  // - INSERT INTO table (key, key) VALUES ('value', 'value')
  // - single-quotes around all values
  // - escape all values to prevent SQL injection
  $sql = "INSERT INTO ".self::$table_name." (";
  $sql .= "title, img, description, nbr_exemplairs";
  $sql .= ") VALUES ('";
  $sql .= $database->escape_value($this->title) ."', '";
  $sql .= $database->escape_value($this->img) ."', '";
  $sql .= $database->escape_value($this->description) ."', '";
  $sql .= $database->escape_value($this->nbr_exemplairs) ."')";
  if($database->query($sql)) {
    $this->id = $database->insert_id();
    return true;
  } else {
    return false;
  }
}

public function update() {
}

public function delete() {
}





}



?>
