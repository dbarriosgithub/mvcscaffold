<?php 
/**
 * 
 */
class Route 
{
	private $controller;
	private $method='index';
	private $params = [];
	
	function __construct()
	{
	    $url =  $this->parseurl();
	  // si existe el archivo XXXController

	    if($url==NULL) {
	      $this->controller = new HomeController();
	      $this->render();
	      exit;
	    }

		if(file_exists(dirname(__DIR__).'/app/controller/'.ucfirst($url[0]).'Controller.php')) {
            $this->controller = ucfirst($url[0]).'Controller';
            unset($url[0]);
		}
		else{
			include_once('view/404.php');
			exit;
		}

		$this->controller =  new $this->controller;

		if(isset($url[1]))
		{
			//capturamos el método
			$this->method =  $url[1];
			if(method_exists($this->controller,$url[1]))
			{
 				unset($url[1]);
			}
			else
			{
				throw new Exception("Error Processing method {$this->method}", 1);
			}
		}
		$this->params = $url?array_values($url):[];
	}

	public function parseurl()
	{

  		if(isset($_GET['url']))
  		{
  			return explode("/",filter_var(rtrim($_GET['url'],"/"),FILTER_SANITIZE_URL));
  		}

	}

	public function render(){
		call_user_func_array([$this->controller,$this->method],$this->params);
	}
}
?>