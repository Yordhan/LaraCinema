@extends('layout')
@section('content')
<div class="container">
    <div class="content">
        <p>
            <a href="{{route('movies_list')}}">
                Retour a la liste de films
            </a>
        </p>
        <div class="title">Creation de film</div>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{route('movies_enregistrer')}}">
            {{ csrf_field() }}
            <p>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title">
            </p>
            <p>
                <label for="image">Image</label>
                <input type="text" name="image" id="image">
            </p>
            <p>
                <label for="synopsis">Synopsis</label>
                <textarea id="synopsis" name="synopsis"></textarea>
            </p>

            <label for="category">Catégorie</label>
            <select id="category" name="category">
                @foreach($categories as $category)

                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>

            <p>
                <button type="submit">Créer le film</button>
            </p>
        </form>
        <form method="post" action="{{route('movies_enregistrer')}}">
            {{ csrf_field() }}
            <div class="panel-body bg-light p25 pb15">





                <!-- Divider -->
                <div class="section-divider mv30 hidden">
                    <span>OR</span>
                </div>

                <div class="section row">
                    <div class="col-md-12">
                        <label for="title" class="field prepend-icon">Titre
                            <input type="text" name="title" id="title" class="gui-input" placeholder="Titre du film...">
                            <label for="title" class="field-icon">
                                <i class="fa fa-user"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <p>
                        <strong>Categorie</strong><br/>
                        <select id="category" name="category">
                            @foreach($categories as $category)

                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </p>

                    <div class="col-md-12">
                        <label for="synopsis" class="field prepend-icon">Synopsis
                            <textarea class="form-control" rows="3" name="synopsis" id="synopsis" ></textarea>
                            <label for="synopsis" class="field-icon">
                                <i class="fa fa-user"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->
                </div>
                <!-- end .section row section -->

                <div class="section">
                    <label for="image" class="field prepend-icon">Image
                        <input type="text" name="image" id="image" class="gui-input" placeholder="Email address">
                        <label for="image" class="field-icon">
                            <i class="fa fa-envelope"></i>
                        </label>
                    </label>
                </div>
                <!-- end section -->

                <label for="category">Catégorie</label>







            </div>

            <div class="panel-footer clearfix">
                <button type="submit" class="button btn-primary mr10">Creer le film</button>

            </div>

        </form>



    </div>
</div>

@endsection

