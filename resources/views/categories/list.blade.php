@extends('layout')
@section('content')

    <h2>
        <a href="/" style="display:block">Page d'accueil</a>
    </h2>
    <h1  style="display: inline-block; margin-right: 16rem";>Liste des catégories</h1>
    <h2 style="display: inline-block">
        <a href="{{route('categories_creer')}}">
            Créer une catégorie
        </a>
    </h2>
    <div class="panel-body pn">
        <div class="table-responsive">
            <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                <thead>
                <tr class="bg-light">
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>
                                <a href="{{route("categories_voir",
                            [
                                "id" => $category->id
                            ]) }}">
                                    {{$category->title }}
                                </a>
                            </td>
                            <td>{{$category->description}}</td>

                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
