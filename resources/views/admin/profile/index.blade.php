@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('content')

<div class="row">

    <div class="header-profile">
        <!-- Header container -->
        <div class="row">
            <div class="col-md-12 col-lg-7">
                <h1 class="title-profile">Olá, {{ Auth::user()->name }}</h1>
                <h4 class="sub-title-profile">Este é o seu perfil. Você poderá alterar seus dados e consultar outras informações de seu usuário.</h4>
            </div>
        </div>
        <div class="grid-profile">
            <div>
                @yield('form')
            </div>
            <div>

                <!-- Profile Image -->
                <div class="box ">
                    <div class="box-body box-profile">
                        <div class="profile-photo">
                            <a data-toggle="modal" href="#modal-photo">
                                @if (Auth::user()->image == null)
                                <img class="img-responsive teste" src="{{ url('/images/users/default.png') }}">
                                @else
                                <img class="img-responsive teste" src="{{ url('/images/users/'. Auth::user()->image) }}">
                                @endif
                                <div class="caption">
                                    <button type="button" class="btn btn-success btn-photo-profile" ><i class="fa fa-camera"></i> <br>Atualizar</button>
                                </div>
                            </a>
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
                        <p class="text-muted text-center">{{ "@" }}{{ Auth::user()->username }} <br>{{ Auth::user()->email }}</p>
                    </div>
                    <!-- /.box-body -->
                </div>

                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações Gerais</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-briefcase margin-r-5"></i> Empresa</strong>
                        <p class="text-muted">
                            Biofarma Manipulação
                        </p>
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Endereço</strong>
                        <p class="text-muted">Pouso Alegre, Minas Gerais</p>
                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.col -->



        <!-- /.col -->
    </div>
    <!-- /.row -->


    @stop