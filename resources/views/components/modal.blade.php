<div class="card-body">
    <div class="btn-group">
        <button type="button" class="btn btn-primary" data-bs-target="#modal-user-create" data-bs-toggle="modal">
            <i class="bi bi-person-plus mr-1"></i> Create new user
        </button>
    </div>
    <div id="modal-user-create" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-right col-md-6">
            <div class="modal-content p-3" style="min-width: 350px !important;">
                <form action="{{ route('api.users.store') }}" method="POST" class="x-submit" data-then="reload">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Create User Account</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <hr class"my-3">
                        <x-form.input name="name" label="Full Name" required />
                        <x-form.input name="email" label="Email" required />
                        <x-form.input name="username" label="Username" required />
                        <div class="row">
                            <div class="col-md-6">
                                <x-form.select name="gender" label="Gender">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </x-form.select>
                            </div>
                            <div class="col-md-6">
                                <x-form.select name="type" label="User Type">
                                    <option value="1">Member</option>
                                    <option value="2">Admin</option>
                                </x-form.select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
