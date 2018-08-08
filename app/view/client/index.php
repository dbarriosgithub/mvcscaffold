<div class="row justify-content-center">	
	<div class="col-md-8">
		<table class="table">
			<thead>
				<tr>
				<th>Id</th>
				<th>Name</th>
				<th>SecondName</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>

			  <?php 
			   if (isset($clients)) {
				  foreach ($clients as $field): ?>
					<tr>
						<td><?= $field['id']; ?></td>
						<td><?= $field['name']; ?></td>
						<td><?= $field['secondname']; ?></td>
						<td><?= $field['address']; ?></td>
						<td><?= $field['phone']; ?></td>
						<td>
							<a href="/client/delete/<?= $field['id']; ?>">
								<span class="fa fa-minus-square-o"></span>
							</a>

							<a href="/client/edit/<?= $field['id']; ?>">
								<span class="fa fa-check-square-o"></span>
							</a>
						</td>
					</tr>
				  <?php endforeach;
			    }
			  ?>
			</tbody>
		</table>
	</div>
</div>