@extends('layouts.guest', ['page_description'=>'Please register as new user!'])

@section('content')
<div class="login-box">
  <div class="login-logo">
    <h1 class="text-uppercase">
        <a href="/"><b>{{ config('app.name') }}</b></a>
    </h1>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please register!</p>

    <form action="{{ route('register') }}" method="post">
        {!! csrf_field() !!}
      <div class="form-group has-feedback">
        <input type="name" class="form-control" placeholder="Full name" value="{{ old('name') }}" name="name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
         @if ($errors->has('name'))
            <span class="help-block ">
                <strong class="text-danger">{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         @if ($errors->has('email'))
            <span class="help-block ">
                <strong class="text-danger">{{ $errors->first('email') }}</strong>
            </span>
        @endif

      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         @if ($errors->has('password'))
            <span class="help-block ">
                <strong class="text-danger">{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password Cofirmation" name="password_confirmation" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         @if ($errors->has('password_confirmation'))
            <span class="help-block ">
                <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
      </div>

        <!-- /.col -->
        <div class="">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>

    </form>

    <hr>

    <div class="">
        <a class="mt-4" href="{{ route('login') }}" class="text-center">Already a member?</a>
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@endsection
