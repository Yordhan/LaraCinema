@extends('layout')
@section('content')
    <h2>
        <a href="{{route('actors_list')}}">
            Retour a la liste d'acteurs
        </a>
    </h2>
        <h1>Creation d'acteurs</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form method="post" enctype="multipart/form-data" action="{{route('actors_enregistrer')}}">
        {{ csrf_field() }}
        <div class="panel-body bg-light p25 pb15">
            <!-- Divider -->
            <div class="section-divider mv30 hidden">
                <span>OR</span>
            </div>

            <div class="section row">
                <div class="col-md-12">
                    <label for="firstname" class="field prepend-icon">Prenom<br />
                        <input type="text" name="firstname" id="firstname" class="gui-input">
                    </label>
                </div>
                <div class="col-md-12">
                    <label for="lastname" class="field prepend-icon">Nom<br />
                        <input type="text" name="lastname" id="lastname" class="gui-input">
                    </label>
                </div>
                <div class="col-md-12">
                    <label for="dob" class="field prepend-icon">Date de naissance<br />
                        <input type="text" name="dob" id="dob" class="gui-input" placeholder="YYYY-MM-dd">
                    </label>
                </div>
                <div class="col-md-12">
                    <label for="city" class="field prepend-icon">Ville<br />
                        <input type="text" name="city" id="city" class="gui-input">
                    </label>
                </div>
                <div class="col-md-12">
                    <label for="nationality" class="field prepend-icon">Nationalité<br />
                        <input type="text" name="nationality" id="nationality" class="gui-input">
                    </label>
                </div>


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
            <button type="submit" class="button btn-primary mr10">Creer l'acteur</button>

        </div>

    </form>

@endsection
