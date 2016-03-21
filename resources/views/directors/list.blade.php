@extends('layout')
@section('content')
    <h2>
        <a href="/" style="display:block">Page d'accueil</a>
    </h2>
    <h1  style="display: inline-block; margin-right: 16rem";>Liste des réalisateurs</h1>
    <h2 style="display: inline-block">
        <a href="{{route('directors_creer')}}">
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($directors as $director)
                        <tr>
                            <td>{{$director->id}}</td>
                            <td>
                                <a href="{{route("directors_voir",
                                [
                                    "id" => $director->id
                                ]) }}">
                                    {!!$director->lastname !!}
                                </a>
                            </td>
                            <td>
                                <a href="{{route("directors_voir",
                                [
                                    "id" => $director->id
                                ]) }}">
                                {!!$director->firstname !!}
                            </td>
                            <td class="w100"><img src="{{$director->image}}" style="width:60%;" /></td>
                            <td>{{$director->dob}}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

@endsection