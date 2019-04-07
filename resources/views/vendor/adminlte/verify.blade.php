

@section('')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
@yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
    </div>
    <!-- /.login-logo -->
        <h4 class="text-center">Bem-vindo(a), <strong>{{Auth::user()->name }}</strong>!</h4>
        <h4 class="text-center">
        Um link de confirmação foi enviado no e-mail <strong>{{Auth::user()->email }}</strong>
        </h4>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('Uma nova confirmação foi enviada. Verifique seu e-mail!') }}
        </div>
        @endif
        <br/>
        <div class="text-center">
        Caso não tenha recebido o e-mail, verifique sua caixa de span ou <a href="{{ route('verification.resend') }}">clique aqui para reenviar</a>. 
        </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
@stop

@section('adminlte_js')
@yield('js')
@stop
