@extends('layout')

@section('content')
    Dashboard
<hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-tile text-center">
                        <div class="panel-body bg-primary light">
                            <i class="fa fa-video-camera fa-5x"></i>
                            <h1 class="fs35 mbn">{{$nbMovies}}</h1>
                            <h6 class="text-white">Nombre de films actifs</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-tile text-center">
                        <div class="panel-body bg-success">
                            <i class="fa fa-comments-o fa-5x"></i>
                            <h1 class="fs35 mbn">{{$nbComments}}</h1>
                            <h6 class="text-white">Nombre de commentaires</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-tile text-center">
                        <div class="panel-body bg-danger">
                            <i class="fa fa-user-secret fa-5x"></i>
                            <h1 class="fs35 mbn">{{$nbActors}}</h1>
                            <h6 class="text-white">Nombre d'acteurs</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-tile text-center">
                        <div class="panel-body bg-warning">
                            <i class="fa fa-user fa-5x"></i>
                            <h1 class="fs35 mbn">{{$nbUsers}}</h1>
                            <h6 class="text-white">Nombre d'utilisateurs actifs</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-tile text-center">
                        <div class="panel-body bg-primary light">
                            <i class="fa fa-usd fa-5x"></i>
                            <h1 class="fs35 mbn">{{$budgetTot}}</h1>
                            <h6 class="text-white">Budget total</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-tile text-center">
                        <div class="panel-body bg-success">
                            <i class="fa fa-heart fa-5x"></i>
                            <h1 class="fs35 mbn">{{$moyenneNote}} / 5</h1>
                            <h6 class="text-white">Moyenne des notes</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-tile text-center">
                        <div class="panel-body bg-danger">
                            <i class="fa fa-user-secret fa-5x"></i>
                            <h1 class="fs35 mbn">{{$ageMoyActors}}</h1>
                            <h6 class="text-white">Age moyen des acteurs</h6>
                        </div>
                    </div>
                </div>
            </div>
@endsection
