@extends('layout')
@section('content')

        <h2>
            <a href="{{route('movies_list')}}">
                Retour a la liste de films
            </a>
        </h2>
        <h1>Creation de film</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" enctype="multipart/form-data" action="{{route('movies_enregistrer')}}">
            {{ csrf_field() }}
            <div class="panel-body bg-light p25 pb15">
                <!-- Divider -->
                <div class="section-divider mv30 hidden">
                    <span>OR</span>
                </div>

                <div class="section row">
                    <div class="col-md-12">
                        <label for="title" class="field prepend-icon">Titre<br />
                            <input type="text" name="title" id="title" class="gui-input" placeholder="Titre du film...">
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="col-md-12">
                        <strong>Categorie</strong><br/>
                        <select id="category" name="category">
                            @foreach($categories as $category)

                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="synopsis" class="field prepend-icon">Synopsis
                            <textarea class="form-control" rows="3" name="synopsis" id="synopsis" ></textarea>
                        </label>
                    </div>
                    <!-- end section -->
                </div>
                <!-- end .section row section -->

                {{--<div class="section">--}}
                    {{--<label for="image" class="field prepend-icon">Image<br />--}}
                        {{--<input type="text" name="image" id="image" class="gui-input">--}}
                    {{--</label>--}}
                {{--</div>--}}

                <div class="section">
                    <label for="image">Image</label>
                        <input type="file" capture="capture" accept="image/*" name="image" id="image">
                </div>
                <!-- end section -->
            </div>

            <div class="panel-footer clearfix">
                <button type="submit" class="button btn-primary mr10">Creer le film</button>

            </div>

        </form>
@endsection

