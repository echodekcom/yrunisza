<?php
class Db {

  public $database;

  public function __construct(){
   $this->connect();
  }

  public function __destruct(){
   $this->disconnect();
  }

  private function connect(){
    $db_host = "405659052.student.yru.ac.th";
    $db_name = "405659052_db";
    $db_user = "405659052_db";
    $db_pass = "1950100196985";

    /*$db_host = "localhost";
    $db_name = "yrunisza";
    $db_user = "root";
    $db_pass = "";*/

    try {
      $this->database = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
      $this->database->exec("SET CHARACTER SET utf8");
    }
    catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  private function disconnect(){
    $this->database = null;
  }
}
error_reporting( error_reporting() & ~E_NOTICE );
?>
