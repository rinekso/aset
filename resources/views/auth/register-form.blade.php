<form method="POST"
      action="{{ url('/register') }}">

      {{ csrf_field() }}

    <!-- name input -->

    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">

        <input id="name"
               name="name"
               type="text"
               class="form-control"
               value="{{ old('name') }}"
               placeholder="Full Name"
               required autofocus>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('name'))

            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>

        @endif

    </div>

    <!-- end name input -->

    <!-- email input -->

    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">

        <input id="email"
               type="email"
               name="email"
               class="form-control"
               value="{{ old('email') }}"
               placeholder="Email"
               required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>


        @if ($errors->has('email'))

            <span class="help-block">
                 <strong>{{ $errors->first('email') }}</strong>
            </span>

        @endif

    </div>

    <!-- end email input -->

    <!-- password input -->

    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">

        <input id="password"
               type="password"
               name="password"
               class="form-control"
               placeholder="Password"
               required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @if ($errors->has('password'))

            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>

        @endif

    </div>

    <!-- end password input -->

    <!-- password confirmation -->

    <div class="form-group has-feedback">

        <input id="password-confirm"
               name="password_confirmation"
               type="password"
               class="form-control"
               placeholder="Retype password"
               required>

        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>

    </div>

    <!-- end password confirmation -->

    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">

        <select class="form-control" name="role">
          <option value="">--pilih jabatan--</option>
          <option value="1">Sub Unit</option>
          <option value="2">Unit</option>
          <option value="3">Bidang</option>
        </select>

    </div>

    <div class="row">

        <!-- submit button -->
        <div class="col-xs-4">

            <button type="submit"
                    class="btn btn-primary btn-block btn-flat">

                Register

            </button>

        </div>

        <!-- end submit button -->

    </div>

</form>