<?php
require_once 'config.inc.php';
require_once('configurations.inc.php');

final class WidgetDb{
    private static $instance= NULL;
    private $host= WIDGET_DATABASE_HOST;
    private $db_name= WIDGET_DATABASE_NAME;
    private $db_username= WIDGET_DATABASE_USERNAME;
    private $db_password= WIDGET_DATABASE_PASSWORD;

    private $conn;

    private function __construct(){
        try{
        $this->conn= new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->db_username, $this->db_password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            header("Location: $sandboxURL?error=ERR_DB_CONN");
        }
    } 
    
    public static function getDbInstance(){
        try{
        if(!self::$instance){
            self::$instance= new WidgetDb();
        }
        return self::$instance;
    }catch(PDOException $ex){
        header("Location: $sandboxURL?error=ERR_DB_CONN");
    }
    }

    public function openDbConnection(){
        if($this->conn){
        return $this->conn;
        }else{
            return "ERR_DB_CONN";
        }
    }
}


?>