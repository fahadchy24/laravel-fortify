@extends('template')

@section('content')
<div class="container">
    <div class="card login-card">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img src="/img/bg-image.jpg" alt="login" class="login-card-img">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <div class="brand-wrapper">
                        <img src="/img/logomark.min.svg" alt="logo" class="logo">
                    </div>
                    <p class="login-card-description">Confirm your password</p>
                    <form method="POST" action="{{ url('user/confirm-password') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="***********">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <input name="confirm" id="confirm" class="btn btn-block login-btn mb-4" type="submit" value="Comfirm">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection