@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_description'=>'Please log in!'])

@section('content')
    <div class="row">
         <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="card card-primary card-outline">
                <div class="card-header with-border">
                    <h3>Sign In</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4  col-form-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="form-text">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4  col-form-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="form-text">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" value="1">
                                         Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-flat">
                                    <i class="fa fa-btn fa-sign-in"></i> Sign In
                                </button>

                                <a class="btn btn-link" href="{{ url('password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
