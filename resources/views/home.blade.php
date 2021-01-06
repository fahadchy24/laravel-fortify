@extends('template')

@section('content')
<div class="container">
    <div class="card login-card">
        <div class="row no gutters">
            <div class="col-md-12">
                <div class="card-body">
                    @if(!auth()->user()->two_factor_secret)
                        You have not enabled 2FA.
                        <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary mt-2">Enable</button>
                        </form>
                    @else
                        You have 2FA enabled.
                        <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary mt-2">Disable</button>
                        </form>
                    @endif


                    @if(session('status') == 'two-factor-authentication-enabled')
                        You have enabled 2FA, please scan the following QR code into your phones authenticator application.
                        {!! auth()->user()->twoFactorQrCodeSvg() !!}

                        <p>Please store these recover codes in a secure location.</p>
                        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                            {{ trim($code) }} <br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection