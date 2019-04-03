@extends('adminlte::page')

@section('title', 'Perfil')
@section('content_header')
<h1>Perfil</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-4 col-lg-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <div class="profile-photo">
                    @if (Auth::user()->image == null)
                    <img class="img-responsive" src="{{ url('/images/users/default.png') }}">
                    @else
                    <img class="img-responsive" src="{{ url('/images/users/'. Auth::user()->image) }}">
                    @endif
                    <div class="caption">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-photo"><i class="fa fa-pencil"></i> </button>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal-photo" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::model(Auth::user(), ['method' => 'POST', 'route' => 'profile.updatePhoto', 'class' => 'form-validate', 'enctype' => 'multipart/form-data']) !!}
                            <div id="slim" class="slim" data-ratio="1:1" min-size="160,160"> 
                                @if (Auth::user()->image == null)
                                <img src="{{ url('/images/users/default.png') }}">
                                @else
                                <img src="{{ url('/images/users/'. Auth::user()->image) }}">
                                @endif
                                {!! Form::input('file', 'image', null, []) !!}
                            </div>
                            <div class="modal-footer float-left">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                <p class="text-muted text-center">{{ Auth::user()->email }}</p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
                <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-8 col-lg-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Informações pessoais</h3>
            </div>

            <div class="box-body">
                {!! Form::model(Auth::user(), ['method' => 'POST', 'route' => 'profile.updateProfile', 'class' => 'form-validate', 'enctype' => 'multipart/form-data']) !!}

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label('name', 'Nome') !!} <span class="text-danger">*</span>
                            {!! Form::input('text', 'name', null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'E-mail') !!} <span class="text-danger">*</span>
                            {!! Form::input('email', 'email', null, ['class' => 'form-control', 'required']) !!}
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

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Alteração de senha</h3>
            </div>

            <div class="box-body">
                {!! Form::model(Auth::user(), ['method' => 'POST', 'route' => 'profile.updatePassword', 'class' => 'form-validate']) !!}

                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            {!! Form::label('password', 'Senha') !!} <span class="text-danger">*</span>
                            {!! Form::input('password', 'password', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Nova senha') !!} <span class="text-danger">*</span>
                            {!! Form::input('password', 'new_password', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Confirme a senha') !!} <span class="text-danger">*</span>
                            {!! Form::input('password', 'confirm_password', null, ['class' => 'form-control', 'required']) !!}
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
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


@stop