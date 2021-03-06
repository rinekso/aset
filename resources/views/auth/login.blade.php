@extends('layouts.master-guest')

@section('title')

    <title>Login</title>

@endsection

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container">

            <!-- content-header with breadcrumbs -->

            <section class="content-header">
            </section>

            <!-- end content-header section -->

@if($errors->any())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  </div>
@endif

@if(Session::has('flash_message'))
  <div class="alert alert-success">
    {{ Session::get('flash_message') }}
  </div>
@endif


            <!-- content -->

            <section class="content">

                <!-- login box -->

                <div class="login-box">

                    <div class="login-logo">

                        <a href="/"><b>Assets</b>Management</a>

                    </div>

                    <!-- login-box-body -->

                    <div class="login-box-body">

                        <p class="login-box-msg">Sign in to start your session</p>

                        <!-- login form -->

                        @include('auth.login-form')

                        <!-- end login form -->
                        <!-- password reset and register links -->

                        {{-- <a href="{{ url('/password/reset') }}">I forgot my password</a><br> --}}
                        <a href="/register" class="text-center">Register a new membership</a>

                    </div>

                    <!-- end login-box-body -->

                </div>

                <!-- end login-box -->

            </section>

            <!-- end section content-->

        </div>

        <!-- end container -->

    </div>

    <!-- end content-wrapper -->

@endsection