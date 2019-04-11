@extends('admin/profile/index')

@section('form')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Alteração de senha</h3>
    </div>

    <div class="box-body">
        {!! Form::model(Auth::user(), ['method' => 'POST', 'route' => 'profile.updatePassword', 'class' => 'form-validate']) !!}

        <div class="row">
            <div class="col-lg-6">

                <div class="form-group">
                    {!! Form::label('old_password', 'Senha') !!} <span class="text-danger">*</span>
                    {!! Form::input('password', 'old_password', null, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Nova senha') !!} <span class="text-danger">*</span>
                    {!! Form::input('password', 'password', null, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirme a senha') !!} <span class="text-danger">*</span>
                    {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                </div>    
            </div>
        </div>
        {!! csrf_field() !!}
        {!! Form::close() !!}
    </div>
</div>
@stop