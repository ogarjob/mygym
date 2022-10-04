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
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
                        
                            <form class="user" action="register" method="POST">

                               {{ csrf_field() }}
                                
                                <div class="form-group">
                                
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Full Name" name="name" required>
                                
                                </div>
                                
                                <div class="form-group">
                                
                                    <input type="email" class="form-control form-control-user" placeholder="Email Address" name="email" required>
                                
                                </div>

                                <div class="form-group">
                                
                                    <input type="text" class="form-control form-control-user" placeholder="Userame" name="username" required>
                                
                                </div>

                               <!--  <div class="form-group">
                                    <select class="form-control form-control-user text-secondary" name="gender" id="gender" required>
                                        <option selected disabled>Gender</option>
                                        <option value="M">male</option>
                                        <option value="F">female</option>
                                        <script>
                                            document.querySelector('#gender').value = "<?//= old('gender', $user->gender)?>"
                                        </script>
                                    </select>
                                </div> -->
                                
                                <div class="form-group relative flex items-center bg-gray-100 rounded-xl">
                                    
                                    <select class="form-control form-control-user flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm" name="gender" required>
                                        <option value="category" disabled selected>Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>

                                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                                        <g fill="none" fill-rule="evenodd">
                                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                                            <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                        </g>
                                    </svg>
                                
                                </div>

                                <div class="form-group row">
                                
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password" required>
                                
                                    </div>
                                
                                    <div class="col-sm-6">
                                
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="repeatPwd" required>
                                
                                    </div>
                                
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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>