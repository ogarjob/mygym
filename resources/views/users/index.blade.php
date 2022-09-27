<?php require resource_path("views/partials/head.php") ?>

<!-- DataTales Example -->
<div class="text-center card shadow mb-4">
    
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">All Users</h3>
    </div>
    
    <div class="card-body">
        
        <div class="table-responsive">
      		
      		<table class="table table-bordered table-hover rounded" id="dataTable" width="100%" cellspacing="0">
                <thead>
					<tr>
						<th>name</th>
						<th>email</th>
						<th>username</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
                <tfoot>
                    <tr>
                   		<th>name</th>
						<th>email</th>
						<th>username</th>
						<th></th>
						<th></th>
				    </tr>
                </tfoot>
                <tbody>

					<?php foreach ($users as $user): ?>

						<tr>
							<td> 
								<?= $user->name ?> 

								<!-- <?php //if ($user->isSuperAdmin()): ?>
									<small class="badge rounded-pill bg-primary ml-2">Super Admin</small>
								<?php //elseif ($user->isAdmin()): ?>
									<small class="badge rounded-pill bg-success ml-2">Admin</small>
								<?php //endif ?> -->
							</td>

							<td> <?= $user->email ?> </td>

							<td> <?= $user->username ?> </td>
							
							<td><a class="btn btn-primary" href="<?= url("/users/profile?id={$user->id}") ?>">Edit</a> </td>

							<td><a class="btn btn-danger" href="<?= url("/users/delete?id={$user->id}") ?>" onclick=" return confirm('Are you sure you want to delete')">delete</a> </td>
							
						</tr>
					
					<?php endforeach; ?>

				</tbody>

            </table>
        </div>
    </div>
</div>

<?php require resource_path("views/partials/footer.php") ?>
