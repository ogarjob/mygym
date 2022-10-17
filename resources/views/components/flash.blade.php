@if (session()->has('message'))

    <div style="position:fixed; right: 0.5%; z-index:3;">

        <p class="container alert alert-success text-center mt-3 z-index-master px-5 h5" style="display:none;" id="alert" >{{ session('message') }}</p>

        <script>
            $(document).ready(function() {
                $("#alert").slideDown("slow", hide);

                function hide()
                {
                    setTimeout(() => $(this).slideUp("slow"), 8000);
                }

                $('#alert').click(function() {
                    $(this).slideUp('slow');
                });

            });

        </script>

    </div>

@endif