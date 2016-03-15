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

        p {
            color: black;
        }

        img {
            width: 40%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <p>
            <a href="{{route("actors_list") }}">
                Retour a la liste d'acteurs
            </a>
        </p>
        <p>
            <img src="{{$actors->image}}" /><br />
            {{$actors->firstname}} {{$actors->lastname}}<br />
            Date de naissance :{{$actors->dob}}<br />
            Nationalité : {{$actors->nationality}}
            Ville : {{$actors->city}}
        </p>
        <p>
            Biographie : {!! $actors->biography !!}
        </p>
        <p>
            <a href="{{route('actors_supprimer', ['id' => $actors->id]) }}" style="font-weight: bold;">Supprimer l'acteur</a>
        </p>



    </div>
</div>
</body>
</html>
