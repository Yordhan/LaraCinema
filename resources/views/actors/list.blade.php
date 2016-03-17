@extends('layout')
@section('content')
        <p>
            <a href="/">Page d'accueil</a>
        </p>
        <h1>Liste des acteur</h1>

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
                            <td>{{$actor->id}}</td>
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

                </table>
            </div>
        </div>
    <hr>
    <a href="{{route('actors_creer')}}">
        Créer un acteur
    </a>

@endsection

