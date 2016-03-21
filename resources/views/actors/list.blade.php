@extends('layout')
@section('content')
    <h2>
        <a href="/" style="display:block">Page d'accueil</a>
    </h2>
        <h1  style="display: inline-block; margin-right: 16rem";>Liste des acteurs</h1>
        <h2 style="display: inline-block">
            <a href="{{route('actors_creer')}}">
                Créer un acteur
            </a>
        </h2>

        <div class="panel-body pn">
            <div class="table-responsive">
                <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                    <thead>
                    <tr class="bg-light">
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Photo</th>
                        <th>Date de naissance</th>
                        <th>Ville</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($actors as $actor)
                        <tr>
                            <td>{{$actor->id}}
                                <a href="{{route("actors_panier", [
                                    'id' => $actor->id
                                ])}}">
                                    @if(!array_key_exists($actor->id, session('id_actors', [])))
                                        <i class="fa fa-star-o"></i>
                                    @else
                                        <i class="fa fa-star"></i>
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a href="{{route("actors_voir",
                                [
                                    "id" => $actor->id
                                ]) }}">
                                    {!!$actor->lastname !!}
                                </a>
                            </td>
                            <td>
                                <a href="{{route("actors_voir",
                                [
                                    "id" => $actor->id
                                ]) }}">
                                {!!$actor->firstname !!}
                            </td>
                            <td class="w100"><img src="{{$actor->image}}" style="width:60%;" /></td>
                            <td>{{$actor->dob}}</td>
                            <td>{{$actor->city}}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    <hr>


@endsection

