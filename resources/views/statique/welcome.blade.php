@extends('layout')

@section('content')
    <i class="fa fa-home fa-3x"></i>
    <h1 style="display:inline-block;">Dashboard</h1>
<hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-tile text-center">
                        <div class="panel-body bg-primary light">
                            <i class="fa fa-video-camera fa-5x"></i>
                            <h1 class="fs35 mbn">{{$nbMoviesAct}}</h1>
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
                <div class="col-md-3">
                    <div class="panel panel-tile text-center">
                        <div class="panel-body bg-warning">
                            <i class="fa fa-clock-o fa-5x"></i>
                            <h1 class="fs35 mbn">{{$moyenneDuree}}h</h1>
                            <h6 class="text-white">Durée moyenne des films</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="panel" id="spy5">
                        <div class="panel-heading">
                            <span class="panel-title">
                              <span class="fa fa-table"></span>5 derniers utilisateurs connectés</span>
                        </div>
                        <div class="panel-body pn">
                            <div class="bs-component">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lastUsers as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->username}}</td>
                                        <td>{{$value->ville}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bs-component">
                        <div class="panel listgroup-widget">
                            <div class="panel-heading">
                                  <span class="panel-icon">
                                    <i class="fa fa-tag"></i>
                                  </span>
                                <span class="panel-title"> Résumé</span>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="badge badge-primary">{{$nbMovies}}</span>
                                    Films
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-success">{{$nbCategories}}</span>
                                    Catégories
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-info">{{$nbActors}}</span>
                                    Acteurs
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-warning">{{$nbDirectors}}</span>
                                    Réalisateurs
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-danger">22</span>
                                    Video Games
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-alert">9</span>
                                    Sports & Events
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

@endsection
