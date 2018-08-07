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
	
	function __construct()
	{
	  $insert = array('id'=>3,
	  	           'name'=>'MArio',
	  	           'secondname'=>'Perez',
	  	           'address'=>'la floresta',
	  	           'phone'=>'321345628');

	  //$this->edit('phone','321345627',$insert);
      $this->delete('phone','321345628');
	}

	public function get($field='',$value=''){
		$this->fields =  array($value);
		$this->query = "select * from clients where $field=?";
		$this->get_results_query();

		if(count($this->rows)==1){
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
                             (id,name,secondname,address,phone)
                             VALUES
                             (?,?,?,?,?)";
             $this->single_query();                
		  }	
		}
	}

	public function edit($field='',$val='',$client_array = array()){
         $this->query ="UPDATE clients
                        SET id=?,name=?,secondname=?,address=?,phone=? 
                        WHERE $field = ?"; 

         $this->fields = array();

         foreach ($client_array as $campo => $value) {
           array_push($this->fields,$value);
         }                
         
         array_push($this->fields,$val);
         $this->single_query();              

	}

	public function delete($field='',$val=''){
        $this->query ="DELETE FROM clients WHERE $field=?";
        $this->fields = array($val);
        $this->single_query();        
	}

}
?>