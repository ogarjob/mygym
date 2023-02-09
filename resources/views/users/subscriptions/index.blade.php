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
                                        <form action="{{ route('api.subscriptions.show', $subscription) }}" method="POST" class="x-submit" data-then="payWithPaystack">
                                            @csrf
                                            <button href="#" class="text-warning btn btn-lg" onclick="payWithPaystack()">↻</button>
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
                <form action="{{ route('api.users.subscriptions.store', $user) }}" method="POST" class="x-submit" data-then="payWithPaystack" data-quietly="true">
                    @csrf
{{--                    <input name="email" type="hidden" id="email-address" value="{{ $user->email }}" >--}}
                    <x-form.input name='date' type="date" label="Date"/>
                    <x-form.field>
                        <x-form.label name="amount" label="Amount"/>
                        <select name="" id="amount" class="form-control">
                            <option>1000</option>
                        </select>
                    </x-form.field>
                    <x-form.button>Subscribe</x-form.button>
                </form>
                <script src="https://js.paystack.co/v1/inline.js"></script>
                <script>
                    function payWithPaystack({data}) {
                        let handler = PaystackPop.setup({
                            key: @js(config('services.paystack.pk')), // Replace with your public key
                            email: data.subscription.user.email,
                            amount: data.subscription.amount * 100,
                            ref: data.subscription.reference, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

                            metadata: {
                                "date": document.getElementById("date").value
                            },
                            onClose: function(){
                                swal({
                                    title: "Something went wrong",
                                    text: "",
                                    icon: "warning",
                                    buttons: {
                                        tryAgain: {
                                            text: "Try Again",
                                            value: "try_again",
                                        },
                                        contactSupport: {
                                            text: "Cancel",
                                            value: "cancel",
                                        },
                                    },
                                    dangerMode: true,
                                }).then((value) => {
                                    switch (value) {
                                        case "try_again":
                                            payWithPaystack({data});
                                            break;
                                        case "cancel":
                                            location.reload()
                                            break;
                                        default:
                                            location.reload()
                                    }
                                });
                            },
                            callback: function(response){
                                swal({
                                    title: "Subscription Successful!",
                                    icon: "success",
                                    button: "OK",
                                });
                                setTimeout(() => location.reload(), 3000)

                            }
                        });
                        handler.openIframe();
                    }
                </script>
            </div>
        </div>
    @endif
</x-layout>
