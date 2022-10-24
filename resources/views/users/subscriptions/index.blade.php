<x-layout>
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Tables</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Subscriptions</h6>
	    </div>
	    <div class="card-body">
	        <div class="table-responsive">	      		
	      		<table class="table table-bordered table-hover rounded" id="dataTable" width="100%" cellspacing="0">
	                <thead>
						<tr>
                            @admin
                                <th>Name</th>
                            @endadmin
							<th>Date</th>
							<th>Amount Paid</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
	                <tfoot>
	                    <tr>
                            @admin
                                <th>Name</th>
                            @endadmin
	                   		<th>Date</th>
							<th>Amount Paid</th>
							<th>Status</th>
							<th></th>
					    </tr>
	                </tfoot>
	                <tbody>
						@foreach ($subscriptions as $sub)
							<tr>
                                @admin
    								<td>{{ $sub->user->name }}</td>
                                @endadmin
                                <td>{{ $sub->date }}</td>
								<td>{{ $sub->amount }}</td>
								<td>
                                    {{ $sub->paid_at ? 'Paid' : 'Pending' }}
                                </td>						
								<td>
                                    @if ($sub->paid_at)
                                        <span class="btn btn-circle btn-success btn-sm"><i class="fas fa-check"></i></span>
                                    @else
                                        <span class=""><i class="fas fa-arrows-rotate"></i></span>
                                        <i class="fa-regular fa-arrows-rotate"></i>
                                    @endif
                                </td>						
							</tr>						
						@endforeach
					</tbody>
	            </table>
	        </div>
	    </div>
	</div>
</x-layout>