@extends('layout.layout')

@section('content')
<div class="container" id="containerlogin">
    <h1 id="title">TO DO LIST</h1>
    <div class="row" >	
        <div class="col-md-6">
            <img src="{{ URL::asset('img/todolist.jpg') }}"  class="img">	
        </div>	
        <div class="col-md-6">        
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" >
 
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group row">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}>"> <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>      
                </div>  
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="Login" value="Login" id="btn">
                    <hr>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            <a class="btn btn-link" href="{{ route('register') }}">
                                {{ __('Create New Account') }}
                            </a>
                        @endif
            </form>
        </div>		
    </div>	
</div>
      

@endsection
