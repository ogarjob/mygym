<x-layout>

    <div>
        <div class="row px-4">
            
            <h4 class="col text-center">Profile</h4>
        
        </div>
        <div class="row mb-4">
            <div class="col-sm-12">
                <!-- Profile -->
                <div class="card bg-secondary">
                    <div class="card-body profile-user-box">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row align-items-center ml-5">
                                    <div class="col-auto">
                                        <div class="avatar-lg" id="div-avatar">
                                       
                                            <img class="rounded-circle img-thumbnail" width="150px" height="150px" src="https://cdn4.iconfinder.com/data/icons/avatars-21/512/avatar-circle-human-male-3-512.png" style="object-fit: cover; object-position: 50% 20%;">

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div>
                                            <h4 class="mt-1 mb-1 text-white">{{$user->name}}</h4>
                                            <p class="bg-light badge rounded-pill">Member</p>

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
                                        
                                        <!-- <input type="hidden" name="_method" value="put"> -->
                                        
                                        <label for="photo" class="btn btn-light"> Change Photo </label>
                                        
                                        <input class="form-control" type="file" 
                                            accept="image/jpg, image/jpeg, image/png"
                                            name="photo" id="photo"    
                                            style="display: none;"
                                            onchange="document.querySelector('#form-photo').submit()"
                                        >
                                    </form>
                                    
                                    @error ('photo')
                                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row -->

                    </div> <!-- end card-body/ profile-user-box-->
                </div><!--end profile/ card -->
            </div> <!-- end col-->
        </div>


        <!--  -->
        <div class="w-75 mx-lg-auto card">

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
                                
                                <div class="text-center">

                                    <button type="submit" class="btn btn-success">Update</button>

                                </div>		
                            
                            </form>

                            <!-- <div class=" mt-3 text-center w-50 mx-auto container">
                        
                                <?php// if (error()) : ?>
                                    
                                    <p class="alert alert-danger"><?//= error() ?></p>
                                
                                <?php// endif ?>

                            </div> -->

                        </div>

                        <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">

                            <form class="container"  method="POST" action="{{ route('users.update', $user->id) }}" >
                                
                                @csrf

                                <div class="row">
                                    
                                    <div class="mb-3 col-md-6">

                                        <label for="new-password" class="form-label">New Password</label>
                                        
                                        <input type="password" class="form-control" name="password" placeholder="Create a new password" id="new-password" required>
                                
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        
                                        <label for="repeat-password" class="form-label">Repeat Password</label>
                                        
                                        <input type="password" class="form-control" name="repeat-password" placeholder="Confirm your new password" id="repeat-password" required>
                                        
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    
                                    <input type="submit" name="" class="btn btn-primary" value="Change Password">
                                
                                </div>

                            </form>

                            <div class=" mt-3 text-center w-50 mx-auto container">
                        
                                @error ('password')
                                    
                                    <p class="alert alert-danger">{{ $message }}</p>
                                
                                @enderror
                                
                            </div>

                        </div>
                    
                        <div class="tab-pane fade container" id="advanced-tab-pane" role="tabpanel" aria-labelledby="advanced-tab" tabindex="0">
                        
                                <?php// if($user->isAdmin() && $user->isNotSuperAdmin()): ?>

                                    <div class="card mb-5 text-center">
                                    
                                        <div class="card-body">
                                    
                                            <h5 class="card-title">Change User Type</h5>
                                    
                                            <p>
                                                Click on the button below to change the User type
                                            </p>
                                    
                                            <a href="<?//= url('/users/dismiss-admin?id='. $user->id); ?>" class="btn btn-warning btn-sm">
                                                Dismiss As Admin
                                            </a>
                                            
                                            </p>
                                        </div>
                                    </div>
                                    
                                <?php// elseif ($user->isNotAdmin() && user('is_admin')): ?>

                                    <div class="card mb-5 text-center">
                                    
                                        <div class="card-body">
                                    
                                            <h5 class="card-title">Change User Type</h5>
                                    
                                            <p>
                                                Click on the button below to change the User type
                                            </p>
                                    
                                            <a href="<?//= url('/users/make-admin?id='. $user->id); ?>" class="btn btn-primary btn-sm">
                                                Make Admin
                                            </a>
                                            
                                            </p>
                                        </div>
                                    </div>

                                <?php// endif; ?>	

                                <div class="card mb-5 text-center">
                                
                                    <div class="card-body">
                                
                                        <h5 class="card-title">Delete Account</h5>
                                
                                        <p>
                                            Click on the button below to terminate your membership. Your account will no longer exist and you will permanently lose your privilages as a user. 
                                        </p>
                                
                                        <a href="<?//= url('/users/delete?id='. $user->id); ?>" class="btn btn-danger btn-sm"  onclick=" return confirm('Are you sure you want to delete this account?')">
                                            Delete Account
                                        </a>
                                        
                                        </p>
                            
                                    </div>
                            
                                </div>
                            
                        </div>
                    
                    </div>

                </div>
        
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</x-layout>