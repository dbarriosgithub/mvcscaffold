<?php
require_once('model.php');
/**
 * clase cliente
 */
class Client extends Model
{

	private $id;
	public $name;
	public $secondname;
	public $address;
	public $phone;
	public $country_id;
	public $country;
	
	function __construct()
	{
	  $this->country =  new Country();
	}


	public function country()
	{
         return $this->country->get('id',$this->country_id);
	}

	public function all()
	{
      $this->fields=[];
      $this->query = 'select * from clients';
      $this->get_results_query();

      return $this->rows;
	}

	public function get($field='',$value=''){
		$this->fields =  array($value);
		$this->query = "select * from clients where $field=?";
		$this->get_results_query();

		 if(count($this->rows)==1)
		 {
		 	$this->rows = $this->rows[0];

			foreach ($this->rows as $attr => $value) {
				$this->$attr = $value ; 
			}
		 }
	}

	public function set($client_array = array()){
		if(array_key_exists('phone',$client_array)){
		  $this->get('phone',$client_array['phone']);

		  //verificar si no existe ese registro
		  if(!$this->rows['phone']==$client_array['phone']) {
		  	 $this->fields = array();
             foreach ($client_array as $campo => $value) {
             	array_push($this->fields,$value);
             }
             $this->query = "INSERT INTO clients 
                             (name,secondname,address,phone,country_id)
                             VALUES
                             (?,?,?,?,?)";
             $this->single_query(); 

             $this->message = 'Este registro se ingresó satisfactoriamente';           
		  }
		  else
		  {
		  	$this->message = 'Este registro ya existe';
		  }	
		}
	}

	public function edit($field='',$val='',$client_array = array()){
         $this->query ="UPDATE clients
                        SET name=?,secondname=?,address=?,phone=?,country_id =? 
                        WHERE $field = ?"; 

         $this->fields = array();

         foreach ($client_array as $campo => $value) {
           array_push($this->fields,$value);
         }                
         
         array_push($this->fields,$val);
         $this->single_query(); 
         $this->message ="El registro $val se editó correctamente";             

	}

	public function delete($field='',$val=''){
        $this->query ="DELETE FROM clients WHERE $field=?";
        $this->fields = array($val);
        $this->single_query(); 
        $this->message ="El registro $val se eliminó correctamente";       
	}

}
?>