@extends('layout.layout')

@section('content')
<div class="container"	>
		<div class="row">	
			<div class="col-md-6">
				<br><br><br>
				<a href="{{ route('login') }}"><button class="btn btn-primary "><i class="fa fa-reply"></i>BACK</button></a>
				<img src="{{ URL::asset('img/todolist.jpg') }}"  class="img">	
            </div>	
            <div class="col-md-6">
                    <h1 id="title">Register</h1>
					<hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group mb-3 input-group-lg">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input  id="name" type="text" class="form-control @error('name') is-invalid @enderror"  name="name"placeholder="Name"required autocomplete="name" autofocus>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $name }}</strong>
                                    </span>
                             @enderror
                        </div>
                        <div class="input-group mb-3 input-group-lg">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input  id="email" type="text" class="form-control @error('email') is-invalid @enderror"  name="email"placeholder="email" required autocomplete="name" >
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
                            <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror"  name="password" placeholder="Password" required>
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
                            <input  id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror"  name="password_confirmation" placeholder="Confirm Password" required>
                          
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{ __('Register') }}
                        </button>
                         
                    </form>
        </div>		

    </div>	
</div>
@endsection