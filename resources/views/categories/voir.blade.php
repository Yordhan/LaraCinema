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
            width: 50%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <p>
            <a href="{{route("categories_list") }}">
                Retour a la liste des catégories
            </a>
        </p>
        <p>
            {{$categories->title}}<br />
            Description :{{$categories->description}}<br />
        </p>
        <p>
            <img src="{{$categories->image}}" />
        </p>

        <p>
            <a href="{{route('categories_supprimer', ['id' => $categories->id]) }}" style="font-weight: bold;">Supprimer la catégorie</a>
        </p>
    </div>

</div>
</body>
</html>
