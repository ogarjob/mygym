<x-layout>
    <div>
        <div class="row px-4">
            <h4 class="col text-center">Profile</h4>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12">
                <!-- Profile -->
                <div class="card bg-primary">
                    <div class="card-body profile-user-box">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row align-items-center ml-5">
                                    <div class="col-auto">
                                        <div class="avatar-lg" id="div-avatar">
                                            <img class="rounded-circle img-thumbnail" src="{{ $user->photo() }}" style="object-fit: cover; object-position: 50% 20%; width: 150px; height: 150px;">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <h4 class="mt-1 mb-0 text-white">{{$user->name}}</h4>
                                           @admin($user)
                                                <p class="mb-1 font-13 text-white-50">Admin</p>
                                                @else
                                                <p class="mb-1 font-13 text-white-50">Member</p>
                                            @endadmin
                                            <!-- <ul class="mb-0 list-inline text-light"> -->
                                                <!-- <li class="list-inline-item me-3"> -->
                                                    <h5 class="mb-0 text-light">Email</h5>
                                                    <p class="mb-1 font-13 text-white-50">{{$user->email}}</p>
                                                <!-- </li> -->
                                                <!-- <li class="list-inline-item"> -->
                                                    <h5 class="mb-0 text-light">Userame</h5>
                                                    <p class="mb-1 font-13 text-white-50">{{$user->username}}</p>
                                                <!-- </li> -->
                                            <!-- </ul> -->
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                            <div class="col-sm-4">
                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                    <form action="{{ route('photo.update', $user->id) }}" id="form-photo" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <label for="photo" class="btn btn-light"> Change Photo </label>
                                        <input class="form-control" type="file" 
                                            accept="image/jpg, image/jpeg, image/png"
                                            name="photo" id="photo"    
                                            style="display: none;"
                                            onchange="document.querySelector('#form-photo').submit()"
                                        >
                                    </form>
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row -->
                    </div> <!-- end card-body/ profile-user-box-->
                </div><!--end profile/ card -->
            </div> <!-- end col-->
        </div>
        <!--  -->
        <div class="col-md-8 offset-md-2 card shadow-lg">
            <div class="card-body">
                <div class="mb-4 mt-3">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="update-tab" data-bs-toggle="tab" data-bs-target="#update-tab-pane" role="tab" aria-controls="update-tab-pane" aria-selected="true">Edit Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" role="tab" aria-controls="password-tab-pane" aria-selected="false">Change Password</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="advanced-tab" data-bs-toggle="tab" data-bs-target="#advanced-tab-pane" role="tab" aria-controls="advanced-tab-pane" aria-selected="false">Advanced</button>
                        </li>
                    </ul>
                </div>
                <div class="">
                    <div class="w-7 py-3">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="update-tab-pane" role="tabpanel" aria-labelledby="update-tab" tabindex="0">
                                <form class="container" method="POST" action="{{ route('users.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="<?= $user->name ?>" id="name">
                                            @error('name')
                                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" value="<?= $user->email ?>" id="email" aria-describedby="emailHelp">
                                            @error('email')
                                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control"  name="username" value="<?= $user->username ?>" id="username">
                                            @error('username')
                                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                            <script>
                                                document.querySelector('#gender').value = "<?= old('gender', $user->gender)?>"
                                            </script>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                                <form class="container"  method="POST" action="{{ route('users.update', $user->id) }}" >
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="new-password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Create a new password" id="new-password" required>
                                            @error('password')
                                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="repeat-password" class="form-label">Repeat Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm your new password" id="repeat-password" required>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <input type="submit" name="" class="btn btn-primary" value="Change Password">
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade container" id="advanced-tab-pane" role="tabpanel" aria-labelledby="advanced-tab" tabindex="0">
                                @can('change-type', $user)
                                    <div class="card mb-5">
                                        <div class="card-body">
                                            <h5 class="card-title">Change User Type</h5>
                                            <p>
                                                Click on the button below to change the User type
                                            </p>
                                            <form action="{{ route('users.update', $user->id) }}" method="POST" >                                                
                                                @csrf
                                                @method('PUT')
                                                @admin($user)
                                                    <input type="hidden" name="type" value="1">
                                                    <button class="btn btn-warning btn-sm">Dismiss As Admin</button>
                                                @else
                                                    <input type="hidden" name="type" value="2">
                                                    <button class="btn btn-primary btn-sm">Make Admin</button>
                                                @endadmin
                                            </form>
                                        </div>
                                    </div>
                                @endcan
                                <div class="card mb-5">
                                    <div class="card-body">
                                        <h5 class="card-title">Delete Account</h5>
                                        <p>
                                            Click on the button below to terminate account. This account will no longer exist and will permanently lose privilages as a user.
                                        </p>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"  onclick=" return confirm('Are you sure you want to delete this account?')">Delete Account</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            function showPasswordTab() {
                $("#update-tab-pane").removeClass("show");
                $("#update-tab-pane").removeClass("active");
                $("#update-tab").removeClass("active");
                $("#password-tab-pane").addClass("show");
                $("#password-tab-pane").addClass("active");
                $("#password-tab").addClass("active");
            }
            @error('password')
                showPasswordTab();
            @enderror
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</x-layout>