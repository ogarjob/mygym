<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
           
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
           
                <div class="row">
           
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
           
                    <div class="col-lg-7">
                        
                        <div class="p-5">
                        
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                        
                            <form class="user" action="{{ route('users.store') }}" method="POST">

                               {{ csrf_field() }}
                                
                                <div class="form-group">
                                
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Full Name" name="name" value="{{ old('name') }}" required>
                                    
                                    @error('name')
                                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                    @enderror

                                </div>
                                
                                <div class="form-group">
                                
                                    <input type="email" class="form-control form-control-user" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                                
                                    @error('email')
                                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="form-group">
                                
                                    <input type="text" class="form-control form-control-user" placeholder="Userame" name="username" value="{{ old('username') }}" required>

                                    @error('username')
                                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <select class="form-select text-secondary rounded-pill" name="gender" id="gender" required>
                                        <option selected disabled>Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        @if (old('gender'))
                                            <script>
                                                document.querySelector('#gender').value = "<?= old('gender')?>"
                                            </script>
                                        @endif
                                    </select>

                                    @error('gender')
                                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                    @enderror

                                </div>
                          
                                <div class="form-group row">
                                
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password" required>
                                
                                    </div>
                                
                                    <div class="col-sm-6">
                                
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation" required>
                                
                                    </div>

                                    @error('password')
                                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                    @enderror

                                </div>
                       
                                <button class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                       
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                       
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                       
                                </a>
                       
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                       
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                       
                            </form>
                            <hr>
                       
                            <div class="text-center">
                       
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                       
                            </div>
                           
                            <div class="text-center">
                       
                                <a class="small" href="login">Already have an account? Login!</a>
                       
                            </div>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>