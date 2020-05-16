@extends('layout.layout')

@section('content')
<div class="container">
		<div class="row">	
			<div class="col-md-6">
				<br><br><br><br><br>
				<img src="{{ URL::asset('img/todolist.jpg') }}"  class="img">		
			</div>		
			<div class="col-md-6">	
				<h1 id="forgottitle">RESET PASSWORD</h1>
					<hr>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required autocomplete="email"  >
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password" autofocus>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                    
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    {{ __('Reset Password') }}
                </button>
        
            </form>
        </div>
    </div>
</div>
@endsection
