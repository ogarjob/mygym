<x-auth>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
    </div>
    <form action="{{ route('api.register.store') }}" method="POST" class="user x-submit" data-then="alert">
        {{ csrf_field() }}
        <x-form.input name="name" placeholder="Full Name" />
        <x-form.input name="email" placeholder="Email Address" />
        <x-form.input name="username" placeholder="Username" />
        <div class="form-group mt-5">
            <select class="form-control text-secondary rounded-pill" name="gender" id="gender" required>
                <option selected disabled>Gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                @if (old('gender'))
                    <script>
                        document.querySelector('#gender').value = "<?= old('gender')?>"
                    </script>
                @endif
            </select>
            <x-form.error name="gender" />
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <x-form.input name="password" type="password" placeholder="Password" />
            </div>
            <div class="col-sm-6">
                <x-form.input name="password_confirmation" type="password" placeholder="Repeat Password" />
            </div>
        </div>
        <x-form.button class="btn-user btn-block">Register Account</x-form.button>
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
</x-auth>
