<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:visited {
            color: black;
        }

        ul {
            list-style-type: none;
        }

        ul li {
            display: inline-block;
            margin-right: 0.8rem;
            font-size: 1.8rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Creation d'acteurs</div>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{route('actors_enregistrer')}}">
            {{ csrf_field() }}
            <p>
                <label for="firstname">Prenom</label>
                <input type="text" name="firstname" id="firstname">
            </p>

            <p>
                <label for="lastname">Nom</label>
                <input type="text" name="lastname" id="lastname">
            </p>

            <p>
                <label for="dob">Date de naissance</label>
                <input type="text" name="dob" id="dob" placeholder="YYYY-MM-dd">
            </p>

            <p>
                <label for="city">Ville</label>
                <input type="text" name="city" id="city">
            </p>

            <p>
                <label for="nationality">Nationalité</label>
                <input type="text" name="nationality" id="nationality" />
            </p>

            <p>
                <label for="image">Image</label>
                <input type="text" name="image" id="image" />
            </p>
            <p>
                <button type="submit">Créer l'acteur</button>
            </p>


        </form>
    </div>
</div>
</body>
</html>
