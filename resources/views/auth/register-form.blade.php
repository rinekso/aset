<form method="POST"
      action="{{ url('/register') }}"
      class="form-horizontal">

      {{ csrf_field() }}

    <!-- id pegawai input -->

    <div class="form-group has-feedback{{ $errors->has('id') ? ' has-error' : '' }}">
        <div class="col-md-12">
          <input id="id"
                 name="id"
                 type="text"
                 class="form-control"
                 value="{{ old('id') }}"
                 placeholder="NIP Pegawai"
                 required autofocus>

          {{-- <span class="glyphicon glyphicon-user form-control-feedback"></span> --}}

          @if ($errors->has('id'))

              <span class="help-block">
                  <strong>{{ $errors->first('id') }}</strong>
              </span>

          @endif
        </div>

    </div>

    <!-- id pegawai input -->

    <!-- name input -->

    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
      <div class="col-md-12">
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

    </div>

    <!-- end name input -->

    <!-- email input -->

    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
      <div class="col-md-12">
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
    </div>

    <!-- end email input -->

    <!-- password input -->

    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
      <div class="col-md-12">
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
    </div>

    <!-- end password input -->

    <!-- password confirmation -->

    <div class="form-group has-feedback">
      <div class="col-md-12">
        <input id="password-confirm"
               name="password_confirmation"
               type="password"
               class="form-control"
               placeholder="Retype password"
               required>

        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
    </div>

    <!-- end password confirmation -->

    <div class="form-group">
      <div class="col-md-12">
        <select class="form-control" id="role" name="role" onChange="changeRole();">
          <option value="">--pilih jabatan--</option>
          <option value="1">Sub Unit</option>
          <option value="2">Unit</option>
          <option value="3">Induk</option>
        </select>
      </div>
    </div>
    <div class="form-group hidden" id="unit">
        <label class="col-md-4 control-label">Nama Unit</label>
        <div class="col-md-8">
          <select class="form-control" name="unit" id="unitselect" onChange="selectSubunit()">
            <option value="">--pilih salah satu--</option>
            @foreach ($unit as $key => $data)
            <option value="{{ $data->id }}">{{ $data->nama_unit }}</option>
            @endforeach
          </select>
        </div>
    </div>

    <div class="form-group hidden" id="subunit">
        <label class="col-md-4 control-label">Nama SubUnit</label>
        <div class="col-md-8">
          <select class="form-control" name="subunit" id="subunitselect">
            <option value="">--pilih salah satu--</option>
            @foreach ($subunit as $key => $data)
            <option value="{{ $data->id }}">{{ $data->nama_subunit }}</option>
            @endforeach
          </select>

          <select class="form-control hidden" name="s2" id="sub2">
            <option value="">--pilih salah satu--</option>
            @foreach ($subunit as $key => $data)
            <option value="{{ $data->unit_id }}">{{ $data->nama_subunit }}</option>
            @endforeach
          </select>

        </div>
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