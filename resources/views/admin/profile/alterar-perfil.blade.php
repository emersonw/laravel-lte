@extends('admin/profile/index')

@section('form')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Informações pessoais</h3>
    </div>

    <div class="box-body">
        {!! Form::model(Auth::user(), ['method' => 'POST', 'route' => 'profile.updateProfile', 'class' => 'form-validate']) !!}

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('name', 'Nome') !!} <span class="text-danger">*</span>
                    {!! Form::input('text', 'name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Deve ter entre 10 e 60 caracteres', 'minlength' => '10', 'maxlength' => '60']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('username', 'Usuário') !!} <span class="text-danger">*</span>
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        {!! Form::input('text', 'username', null, ['class' => 'form-control', 'required', 'placeholder' => 'Deve ter entre 4 e 25 caracteres', 'minlength' => '4', 'maxlength' => '25']) !!}
                    </div>
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