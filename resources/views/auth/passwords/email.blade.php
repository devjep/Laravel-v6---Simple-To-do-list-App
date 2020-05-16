@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">	
        <div class="col-md-6">
            <br><br><br><br><br>
            <a href="{{ route('login') }}"><button class="btn btn-primary "><i class="fa fa-reply"></i>BACK</button></a>
            <img src="{{ URL::asset('img/todolist.jpg') }}"  class="img">	
        </div>		
        <div class="col-md-6">	
            <h1 id="forgottitle">FORGOT PASSWORD</h1>
                <hr>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="input-group mb-3 input-group-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection
