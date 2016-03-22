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
        <div class="panel-body bg-light p25 pb15">
            <!-- Divider -->
            <div class="section-divider mv30 hidden">
                <span>OR</span>
            </div>

            <div class="section row">
                <div class="col-md-12">
                    <label for="title" class="field prepend-icon">Titre<br />
                        <input type="text" name="title" id="title" class="gui-input">
                    </label>
                </div>
                <div class="col-md-12">
                    <label for="description" class="field prepend-icon">Description<br />
                        <input type="text" name="description" id="description" class="gui-input">
                    </label>
                </div>
                <!-- end section -->

                <!-- end section -->
            </div>
            <!-- end .section row section -->

            <div class="section">
                <label for="image">Image</label>
                <input type="file" capture="capture" accept="image/*" name="image" id="image">
            </div>
            <!-- end section -->
        </div>

        <div class="panel-footer clearfix">
            <button type="submit" class="button btn-primary mr10">Creer la catégorie</button>

        </div>

    </form>

@endsection