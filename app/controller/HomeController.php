<?php 
/**
 * 
 */
class HomeController
{
	
	function __construct()
	{
		# code...
	}

	    public function index()
	 	{
	 		View::set('name','Client Register');
	 		View::render('listclient');
	 	}
	
	 	public function create()
	 	{
	 		# code...
	 	}
	
	 	public function store()
	 	{
	 		# code...
	 	}
	
	 	public function show()
	 	{
	 		# code...
	 	}
	 	public function edit()
	 	{
	 		# code...
	 	}
	
	 	public function update()
	 	{
	 		# code...
	 	}
}

 ?>