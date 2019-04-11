@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('content')

<div class="row">
    <div class="col-md-4 col-lg-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <a data-toggle="modal" href="#modal-photo">
                    <div class="profile-photo">
                        @if (Auth::user()->image == null)
                        <img class="img-responsive" src="{{ url('/images/users/default.png') }}">
                        @else
                        <img class="img-responsive" src="{{ url('/images/users/'. Auth::user()->image) }}">
                        @endif
                        <div class="caption">
                            <button type="button" class="btn btn-success btn-photo-profile" ><i class="fa fa-camera"></i> <br>Atualizar</button>
                        </div>
                    </div>
                </a>

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
        @yield('form')
    </div>


    <!-- /.col -->
</div>
<!-- /.row -->


@stop