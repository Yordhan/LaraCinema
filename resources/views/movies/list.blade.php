@extends('layout')
@section('content')
        <a href="/" style="display:block">Page d'accueil</a>

        <h1 style="display: inline-block; margin-right: 16rem;">Liste de nos films</h1>
        <h4 style="display: inline-block">
            <a href="{{route('movies_creer')}}">
                Créer un film
            </a>
        </h4>
        <div class="panel-body pn">
            <div class="table-responsive">
                <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                    <thead>
                        <tr class="bg-light">
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Photo</th>
                            <th>Catégorie</th>
                            <th class="text-center">Synopsis</th>
                            <th>Distributeur</th>
                            <th>Note de la presse</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($movies as $movie)
                    <tr>
                            <td>{{$movie->id}}
                                <a href="{{route("movies_panier", [
                                    'id' => $movie->id
                                ])}}">
                                    @if(!array_key_exists($movie->id, session('id_movies', [])))
                                        <i class="fa fa-heart-o"></i>
                                    @else
                                        <i class="fa fa-heart"></i>
                                    @endif
                                </a>
                            </td>

                            <td><a href="{{route("movies_voir",
                            [
                                "id" => $movie->id
                            ]) }}">
                            {{$movie->title }}
                            </a></td>

                        <td class="w100"><img src="{{$movie->image}}" style="width:60%;" /></td>
                        <td>bla bla bla bla bla bla</td>
                        <td>{{strip_tags(str_limit($movie->synopsis, $limit = 100, $end = '...'))}}</td>
                        <td>{{$movie->distributeur}}</td>
                        <td>{{$movie->note_presse}}</td>
                        <td class="text-right">
                            <div class="btn-group text-right">
                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Visible
                                    <span class="caret ml5"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route("movies_editer",
                                        [
                                            "id" => $movie->id
                                        ]
                                        )}}">Editer</a>
                                    </li>
                                    <li>
                                        <a href="{{route('movies_supprimer', ['id' => $movie->id]) }}">Supprimer le film</a>
                                    </li>
                                    @if($movie->visible == 0)
                                    <li>
                                        <a href="{{route('movies_visible', ['id' => $movie->id])}}">Visible</a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{route('movies_visible', ['id' => $movie->id])}}">invisible</a>
                                    </li>
                                    @endif
                                 </ul>
                            </div>
                        </td>


                        {{--<p>--}}
                            {{--@if($movie->visible == 0)--}}
                                {{--<a href="{{route('movies_visible', ['id' => $movie->id])}}" style="font-weight: bold;">Rendre le film visible</a>--}}
                            {{--@else--}}
                                {{--<a href="{{route('movies_visible', ['id' => $movie->id])}}" style="font-weight: bold;">Rendre le film invisible</a>--}}
                            {{--@endif--}}
                        {{--</p>--}}

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>




@endsection
