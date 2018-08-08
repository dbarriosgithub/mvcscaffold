
	    <div class="row justify-content-center align-items-center mt-5 mx-auto">

	    <form method="post" name="frmclient" action="<?=$action;?>"  class="col-md-4 border rounded p-5">
			<label for="nombre">Nombre:</label>
			<input class="form-control" type="text" name="name" id="nombre" 
			 value="<?= isset($client->name)? $client->name :'';?>"><br>
			<label for="secondname">Apellido:</label>
			<input class="form-control" type="text" name="secondname" id="secondname"
			 value="<?= isset($client->secondname)? $client->secondname :'';?>"></br>
			<label for="address">Direccion:</label>
			<input class="form-control" type="text" name="address" id="address"
			 value="<?= isset($client->address)? $client->address :'';?>"></br>
			<label for="phone">Celphone:</label>
			<input class="form-control" type="text" name="phone" id="phone"
			 value="<?= isset($client->phone)? $client->phone :'';?>"></br>
			<button class="btn btn-primary" type="submit"><?=$namebutton; ?></button>
		</form>
		</div>

	


