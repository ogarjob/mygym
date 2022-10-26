<x-layout>
    <x-card class="col-md-6 offset-md-3">
        <x-slot name="heading">Subscription Details</x-slot>        
        <table class="table table-bordered table-hover rounded" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>Member</th>
                <td>{{ $subscription->user->name }}</td>
            </tr>
            <tr>
                <th>Amount paid</th>
                <td>1000</td>
            </tr>
            <tr>
                <th>Transaction ID</th>
                <td>{{ $subscription->reference }}</td>
            </tr>
            <tr>
                <th>Payment status</th>
                <td>{{ $subscription->paid_at ? 'Successful'   : 'Pending' }}</td>
            </tr>
            <tr>
                <th>Paid at</th>
                <td>{{ $subscription->paid_at ?? '--------' }}</td>
            </tr>
        </table>
    </x-card>
    <div class="text-center">
        <button class="btn btn-outline-primary btn-lg">Print</button>
        <button class="btn btn-primary btn-lg ml-4">Share</button>
    </div>
</x-layout>
