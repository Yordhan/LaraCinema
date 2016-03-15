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
        <p>
            <a href="/">Page d'accueil</a>
        </p>
        <div class="title">Liste des realisateurs</div>
        @foreach($directors as $director)
            <p>
                <a href="{{route("directors_voir",
                [
                    "id" => $director->id
                ]) }}">
                    {{$director->firstname }}
                    {!!$director->lastname !!}
                </a>
            </p>
        @endforeach
    </div>
    <hr>
    <a href="{{route('directors_creer')}}">
        Créer un réalisateur
    </a>
</div>
</body>
</html>
