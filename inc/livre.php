<?php
require_once("database.php");

 class Livre{

  public  $id;
  public  $title;
  public  $img;
  public  $description;
  public  $nbr_exemplairs;
  public  $no_of_books;
  private  static $table_name = "livres";



  public function title(){
    if(isset($this->title))
    return $this->title;
    else
    return "No Title";
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
  public static function get_count_of_books(){
    global $db;
    $count_sql = "select count(id) from livres;";
    $result_set= $db->query(($count_sql));
    $counted = $db->fetch_array($result_set);

    return $counted['count(id)'];
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
