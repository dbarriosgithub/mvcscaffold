<?php 
 class ClientController{

        public function index()
    	{
            $client = new Client();

            View::set('name','Clients List');
            View::set('clients', $client->all());
            View::render('client/index');
    	}

    	public function create()
    	{
            if(isset($_POST))
            {
              $client = new Client();
              $client->set($_POST);
              View::set('message', $client->message);
            } 

    		View::set('name','Client register');
            View::set('namebutton','Registrar');
            View::set('action','/client/create');
            View::render('client/create');
    	}
        
    	public function store()
    	{
    		# code...
    	}
   
    	public function show()
    	{
    		# code...
    	}
    	public function edit($id)
    	{
    	   $client = new Client();
           $client->get('id',$id);
           View::set('client',$client);
           View::set('name','Client register');
           View::set('namebutton','Editar');
           View::set('action',"/client/update/$id");
           View::render('client/create');
    	}
   
    	public function update($id)
    	{
    	   $client = new Client();
           $client->edit('id',$id,$_POST);
           View::set('message', $client->message);
           View::set('name','Clients List');
           View::set('clients', $client->all());
           View::render('client/index');
    	}

        public function delete($id)
        {
           $client = new Client();
           $client->delete('id',$id);
           View::set('message',$client->message);
           View::set('clients', $client->all());
           View::render('client/index');
        }
 }
 ?>