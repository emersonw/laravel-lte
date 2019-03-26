@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
<h1>Perfil do usuário</h1>
@stop

@section('content')

@include('admin.includes.alerts')


<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                 @if (Auth::user()->image != null)
                        <img class="profile-user-img img-responsive img-circle" src="{{ url('storage/users/'. Auth::user()->image) }}" alt="{{ Auth::user()->image }}" width="160px">
                    @endif

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                <p class="text-muted text-center">Software Engineer</p>

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
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                {!! Form::model(Auth::user(), ['method' => 'POST', 'route' => 'profile.update', 'class' => 'form-validate', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nome') !!} <span class="text-danger">*</span>
                    {!! Form::input('text', 'name', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'E-mail') !!} <span class="text-danger">*</span>
                    {!! Form::input('email', 'email', null, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Senha') !!}
                    {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">


                    {!! Form::label('image', 'Imagem') !!}
                    {!! Form::input('file', 'image', null, ['class' => 'form-control']) !!}
                </div>       
                <div class="form-group ">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                </div>                         
                {!! csrf_field() !!}
                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


@stop