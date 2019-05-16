@extends('admin/profile/index')

@section('form')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Alteração de e-mail</h3>
    </div>

    <div class="box-body">
        {!! Form::model(Auth::user(), ['method' => 'POST', 'route' => 'profile.sendEmailAuth', 'class' => 'form-validate']) !!}
        <div class="row">
            <div class="col-lg-6">

                <div class="form-group">
                    {!! Form::label('email', 'Novo e-mail') !!} <span class="text-danger">*</span>
                    {!! Form::input('email', 'email', null, ['class' => 'form-control', 'required', 'maxlenght' => '60']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email_confirmation', 'Confirme o e-mail') !!} <span class="text-danger">*</span>
                    {!! Form::input('email', 'email_confirmation', null, ['class' => 'form-control', 'required', 'maxlenght' => '60']) !!}
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