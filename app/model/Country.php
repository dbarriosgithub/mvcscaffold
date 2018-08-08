<?php 
Class Country extends model
{

  private $id;
  public $name;
  public $contrycode;	

  function  __construct(){

  }


  //get 
  public function get($field='',$value='')
  {
    $this->fields =  array($value);
    $this->query("select * from countries where $field = ? ");
    $this->get_results_query();

    if(count($this->row)==1 )
    {
    	$this->row = $this->row[0];
    	foreach ($this->row as $attr => $value) {
    		$this->$attr =  $value;	
    	}
    }
  }

  //set
  public function set($country_array = array())
  {
      if(array_key_exists('name', $country_array))
      {
      	$this->get('name',$country_array['name']);

      	if(!($this->row['name']==$country_array['name']))
      	{
      		$this->fields= array();

      		foreach ($country_array as $field => $value) {
      			array_push($this->fields,$value);
      		}

      		$this->query = "INSERT INTO countries
                    (name,countrycode)
                    VALUES (?,?)";

            $this->single_query();

            $this->message = "EL registro fue ingresado exitósamente";       

      	}
      	else
      	{
      		$this->message ="Ya existe este registro";
      	}

      }
     

  }

  //edit
 public function edit ($field='',$value='',$country_array = array())
 {
	 	$this->fields = array();

	 	$this->query = "UPDATE countries
	 	                SET name=?,countrycode=?
	 	                WHERE $field = ?";
	 	foreach ($country_array as $field => $value)
	 	{
	 	     array_push($this->fields,$value);
	 	}  

	 	array_push($this->fields,$field);   
	 	$this->single_query();
	 	$this->message = "El registro fué editado exitósamente";
 }


   //delete
   public function delete($field='',$val='')
   {
   		$this->query="DELETE from countries WHERE $field =?";
   		$this->fields = array($val);
   		$this->single_query();
   		$this->message = "Este registro fué eliminado satisfactoriamente";
   }

}

 ?>