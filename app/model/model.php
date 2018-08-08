<?php
abstract class model {
	private static $host='localhost';
	private static $user='root';
	private static $password ='root';
	protected $databasename ='mytestdb';
	protected $rows = array();
	protected $fields = array();
	protected $query;
	private $conn;
  public $message='OK';


    abstract protected function  get();
    abstract protected function  set();
    abstract protected function  edit();
    abstract protected function  delete();
    
    // método open_connection sólo está disponible para acceso dentro de la clase Model
    private function open_connection(){

      try {
     	$this->conn = new PDO("mysql:host=".self::$host.";dbname=$this->databasename",self::$user,self::$password);
     	$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 

       	if($this->conn){
       		// echo "la conexión se realizó exitósamente";
       	}
       }
       catch(PDOException $e){
       	echo $e->getMessage();
       }

     }
   
  //método para realizar consultas SQL tipo:INSERT,DELETE,UPDATE 
   protected function single_query(){
       $this->open_connection();
      try{
        $this->conn->prepare($this->query)->execute($this->fields);
      }catch(PDOException $e){
      	echo $e->getMessage();
      }

   }

   protected function get_results_query() {
   	  $this->open_connection();

   	  try {

       $stm = $this->conn->prepare($this->query);
       $stm->execute($this->fields);
       $this->rows = $stm->fetchAll(PDO::FETCH_ASSOC);

      }catch(PDOException $e){
      	echo $e->getMessage();
      }
      
   }	
}
?>