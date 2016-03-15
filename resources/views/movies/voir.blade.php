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

        img {
            width: 40%;
        }

        .next_before{
            font-weight: bold;
        }

    </style>
</head>
<body>
<div class="container">
    <p>
        <a href="{{route("movies_list") }}">
            Retour a la liste de films
        </a>
    </p>
    <p>
        <a href="" class="next_before">
            Film precedent
        </a>
    </p>
    <div class="content">
        <h1>{{$movie->title }}</h1>
        <img src="{{$movie->image}}" />
        <p>{!!$movie->synopsis !!}</p>
    </div>

    <p>
        <a href="" class="next_before">
            Film precedent
        </a>
    </p>
    <p>
        <a href="{{route('movies_supprimer', ['id' => $movie->id]) }}" style="font-weight: bold;">Supprimer le film</a>
    </p>
</div>
</body>
</html>
