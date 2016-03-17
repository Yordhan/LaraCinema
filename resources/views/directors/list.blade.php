@extends('layout')
@section('content')
        <p>
            <a href="/">Page d'accueil</a>
        </p>
        <div class="title">Liste des realisateurs</div>
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
    <hr>
    <a href="{{route('directors_creer')}}">
        Créer un réalisateur
    </a>

@endsection