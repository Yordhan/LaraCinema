@extends('layout')
@section('content')
    <h2>
        <a href="{{route('categories_list')}}">
            Retour a la liste de catégories
        </a>
    </h2>
        <h1>Creation d'une catégorie</h1>


        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" enctype="multipart/form-data" action="{{route('categories_enregistrer')}}">

            {{ csrf_field() }}
            <p>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title">
            </p>

            <p>
                <label for="description">Description</label>
                <input type="text" name="description" id="description">
            </p>

            <p>
                <label for="image">Image</label>
                <input type="file" capture="capture" accept="image/*" name="image" id="image">
            </p>


            <p>
                <button type="submit">Créer la catégorie</button>
            </p>


        </form>



    </div>
@endsection