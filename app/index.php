<?php

include_once('Route.php');

//directorio del proyecto
define("PROJECTPATH", dirname(__DIR__));
 
//directorio app
define("APPPATH", PROJECTPATH . '/app');
 


//autoload con namespaces
function autoload_classes($class_name)
{
    $directories = array('model','controller','view'); 
    $filename = NULL;

    foreach($directories as $dir) {
      $filename = APPPATH.'/'.$dir.'/'.str_replace('\\', '/', $class_name) .'.php';

    	if(is_file($filename)) {
    	  break;
    	}
    }
    
    if($filename!=NULL)
    {
       include_once $filename;
    }
    else {
       die("The file {$class_name} could not be found!");
    }
}
//registramos el autoload autoload_classes
spl_autoload_register('autoload_classes');


$app =  new Route();
$app->render();
	
?>