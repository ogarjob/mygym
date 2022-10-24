<x-layout>
	
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Tables</h1>
	<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
	    For more information about DataTables, please visit the <a target="_blank"
	        href="https://datatables.net">official DataTables documentation</a>.</p>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
	    </div>
	    <div class="card-body">
	        <div class="table-responsive">
	      		
	      		<table class="table table-bordered table-hover rounded" id="dataTable" width="100%" cellspacing="0">
	                <thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Username</th>
							<th>Edit User</th>
							<th>Delete User</th>
						</tr>
					</thead>
	                <tfoot>
	                    <tr>
	                   		<th>Name</th>
							<th>Email</th>
							<th>Username</th>
							<th>Edit User</th>
							<th>Delete User</th>
					    </tr>
	                </tfoot>
	                <tbody>

						@foreach ($users as $user)

							<tr>

								<td> 
									{{ $user->name }} 
								</td>

								<td> {{ $user->email }} </td>

								<td> {{ $user->username }} </td>
								
								<td><a class="btn btn-primary" href="{{ route('users.show', $user) }}">Edit</a> </td>

								<td>
									<form action="{{ route('users.destroy', $user) }}" method="POST">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger"  onclick=" return confirm('Are you sure you want to delete this account')">Delete</button>
									</form>
								 
								</td>
								
							</tr>
						
						@endforeach

					</tbody>

	            </table>
	        </div>
	    </div>
	</div>

</x-layout>