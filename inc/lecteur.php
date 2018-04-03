<?php
require_once('database.php');
class Lecteur{
    /*encaplulate fields later*/
    public  $id;
    public  $first_name;
    public  $last_name;
    public  $password;
    public  $username;
    private  static $table_name = "lecteurs";

    public function full_name(){
      if(isset($this->first_name) && isset($this->last_name))
      return $this->first_name.' '.$this->last_name;
      else
      return "";
    }
    public static function authenticate($username="",$password=""){
      global $db;
      $username = $db->escape_value($username);
      $password = $db->escape_value($password);
      $sql  = "SELECT * FROM lecteurs WHERE username = '{$username}'  ";
      $sql  .= "AND password = '{$password}'  LIMIT 1";
      $result_array = self::find_by_sql($sql);
      $ret = !empty($result_array) ? array_shift($result_array) : false;
      return $ret;
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
         /*
             $object->username    = $row['id'];
             $object->first_name  = $row['first_name'];
             $object->last_name   = $row['last_name'];
             $object->password    = $row['password'];
             $object->username    = $row['username'];
         */

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

 }





?>
