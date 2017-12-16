@extends('layouts.app3')

@section('content')
<br>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div>
              <div class="section-header text-center">
      					<h2 class="title"> Se connecter</h2>
      				</div>
                <div >
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="contact-form">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">

                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                                    </label>
                                </div>
                            </div>



                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="main-btn">
                                    Se connecter
                                </button>
                                </br>
                                <button class="main-btn">
                                    <a class="btn btn-link text-white" href="{{ URL::route('auth/facebook') }}">
                                        Facebook
                                    </a>
                                </button>
                                </br>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br><br>
<br>
<br>
<br>


@endsection
