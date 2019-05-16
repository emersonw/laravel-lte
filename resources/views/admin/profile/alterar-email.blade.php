@extends('admin/profile/index')

@section('form')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Alteração de e-mail</h3>
    </div>

    <div class="box-body">
        {!! Form::model(Auth::user(), ['method' => 'POST', 'route' => 'profile.sendEmailAuth', 'class' => 'form-validate']) !!}
        <p>Clique no botão abaixo para receber um e-mail em <b>{{ Auth::user()->email }}</b> e prosseguir com a alteração.</p>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::submit('Alterar e-mail', ['class' => 'btn btn-success']) !!}
                </div>    
            </div>
        </div>
        {!! csrf_field() !!}
        {!! Form::close() !!}
    </div>
</div>
@stop                                                                                                                                                         