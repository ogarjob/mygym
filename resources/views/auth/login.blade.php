<x-auth>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
    </div>
    <form action="{{ route('api.login') }}" method="POST" class="user x-submit" data-then="reload">
        @csrf
        <x-form.input name="email" placeholder="Enter Email Address..." />
        <x-form.input name="password" type="password" placeholder="Password" />
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                <label class="custom-control-label" for="customCheck">Remember
                    Me</label>
            </div>
        </div>
        <x-form.button class="btn-user btn-block">Login</x-form.button>
        <hr>
        <a href="index.html" class="btn btn-google btn-user btn-block">
            <i class="fab fa-google fa-fw"></i> Login with Google
        </a>
        <a href="index.html" class="btn btn-facebook btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
        </a>
    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="forgot-password.html">Forgot Password?</a>
    </div>
    <div class="text-center">
        <a class="small" href="{{ route('register.create') }}">Create an Account!</a>
    </div>
</x-auth>
