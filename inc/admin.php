<?php
require_once('database.php');
class Admin{
    /*encaplulate fields later*/
    public  $id;
    public  $first_name;
    public  $last_name;
    public  $password;
    public  $username;
    private  static $table_name = "admins";


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
      $sql  = "SELECT * FROM admins WHERE username = '{$username}'  ";
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





	public function create() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
	  $sql = "INSERT INTO lecteurs (";
	  $sql .= "username, password, first_name, last_name";
	  $sql .= ") VALUES ('";
		$sql .= $database->escape_value($this->username) ."', '";
		$sql .= $database->escape_value($this->password) ."', '";
		$sql .= $database->escape_value($this->first_name) ."', '";
		$sql .= $database->escape_value($this->last_name) ."')";
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
