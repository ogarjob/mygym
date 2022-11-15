<x-layout>
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Subscriptions</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
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
						@foreach ($subscriptions as $subscription)
							<tr>
                                @admin
    								<td>
                                        <a href="{{ route('users.subscriptions.index', $subscription->user) }}">{{ $subscription->user->name }}
                                        </a>
                                    </td>
                                @endadmin
                                <td>{{ $subscription->date }}</td>
								<td>{{ $subscription->amount }}</td>
                                @if ($subscription->paid_at)
                                    <td><span class="badge badge-success">Paid</span></td>
                                    <td><a href="{{ route('subscriptions.show', $subscription) }}" class="btn btn-circle btn-info btn-sm m-2"><i class="fas fa-info-circle"></i></a></td>
                                @else
                                    <td><span class="badge badge-warning">Pending</span></td>
                                    <td>
                                        <form action="{{ route('subscriptions.update', $subscription) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button href="#" class="text-warning btn btn-lg">↻</button>
                                        </form>	
                                    </td>
                                @endif
							</tr>						
						@endforeach
					</tbody>
	            </table>
	        </div>
	    </div>
	</div>
    @if (request()->route()->named('users.subscriptions.index'))
        <div class="col-md-4 card shadow mb-4 px-0">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Make New Subscription</h6>
            </div> 
            <div class="card-body">
                <form action="{{ route('users.subscriptions.store', $subscription->user) }}" method="POST">
                    @csrf
                        <x-form.input name='date' type="date"/>
                        <x-form.field>
                            <x-form.label name="amount"/>
                            <select name="amount" id="amount" class="form-control">
                                <option value="1000">1000</option>
                            </select>
                        </x-form.field>
                        <x-form.field>
                            <x-form.label name="card"/>
                            <select name="card" id="card" class="form-control">
                                <option value="1000">***********8495</option>
                                <option value="1000">***********3645</option>
                                <option value="1000">***********1589</option>
                            </select>
                        </x-form.field>
                        <x-form.button>Subscribe</x-form.button>
                </form>
            </div>
        </div>
    @endif
</x-layout>