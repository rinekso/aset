@extends('layouts.master-guest')

@section('title')

    <title>Register</title>

@endsection

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container">

            <!-- content-header has breadcrumbs -->

            <section class="content-header">
            </section>

            <!-- end content-header section -->

            <!-- content has form -->

            <section class="content">

                <div class="register-box">

                    <div class="register-logo">

                        <a href="/"><b>Assets</b>Management</a>

                    </div>

                    <div class="register-box-body">

                        <p class="login-box-msg">Register a new membership</p>

                        <div>

                            <!-- register form -->

                            @include('auth.register-form')

                            <!-- end register form -->

                        </div>

                        <a href="/login"
                           class="text-center">
                            I already have a membership
                        </a>

                    </div>

                    <!-- end form-box -->
                </div>

                <!-- end register-box -->

            </section>

            <!-- end content section -->

        </div>

        <!-- end container -->

    </div>

    <!-- end content-wrapper -->

@endsection

@section('scripts')

    <script>
        function changeRole(){
            if (document.getElementById("role").value === "1") {
                // document.getElementById("induk").classList.remove('hidden');
                document.getElementById("unit").classList.remove('hidden');
                document.getElementById("subunit").classList.remove('hidden');
            } else if (document.getElementById("role").value === "2") {
                // document.getElementById("induk").classList.remove('hidden');
                document.getElementById("unit").classList.remove('hidden');
                document.getElementById("subunit").classList.add('hidden');
            } else if(document.getElementById("role").value === "3"){
                // document.getElementById("induk").classList.remove('hidden');
                document.getElementById("unit").classList.add('hidden');
                document.getElementById("subunit").classList.add('hidden');
            } else {
                // document.getElementById("induk").classList.add('hidden');
                document.getElementById("unit").classList.add('hidden');
                document.getElementById("subunit").classList.add('hidden');
            }
        }

        function selectSubunit(){
            
            var banyak = document.getElementById("subunitselect").length;
            for (var i = 0; i < banyak ; i++){
                document.getElementById("subunitselect").options[i].hidden = false;
                if (document.getElementById("unitselect").value != document.getElementById("sub2").options[i].value) {
                    document.getElementById("subunitselect").options[i].hidden = true;
                }
            }
        }
    </script>

@endsection
