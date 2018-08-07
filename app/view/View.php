<?php 
/**
 * 
 */
class View
{

	protected static $data;
    protected static $layout = 'layout';
	const VIEW_PATHS = '../app/view';
	const EXT_TEMPLATES ='php';
   
   
	

	//render

	public static function render($template){

		if (!file_exists(self::VIEW_PATHS."/".self::$layout.".".self::EXT_TEMPLATES)) {
			throw new \Exception("Error en el archivo".self::VIEW_PATHS."/".self::$layout.'.'.self::EXT_TEMPLATES." no existe",1);
		}

		//iniciar el stream - crear variables -include stream -capturar stream- cerrar stream -salida
        
         ob_start();

        if(file_exists(self::VIEW_PATHS."/".$template.".".self::EXT_TEMPLATES))
        {
           self::$data['body']  = self::VIEW_PATHS."/".$template.".".self::EXT_TEMPLATES;
        }
        else
        {
        	throw new \Exception("Error en el archivo".self::VIEW_PATHS."/".$template.'.'.self::EXT_TEMPLATES." no existe",1);
        }

       

        extract(self::$data);

        include(self::VIEW_PATHS.'/'.self::$layout.".".self::EXT_TEMPLATES);
        
        $str=  ob_get_contents();
        ob_clean();
        echo $str;

	}

	//set
    public static function set($name,$value) {
        self::$data[$name] =  $value;
    }

    public static function setLayout($layout)
    {
        $this->layout = $layout;
    }

}
 ?>