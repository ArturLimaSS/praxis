<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - Praxis</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body>
    <h1>Cidades</h1>
    <ul>
        @foreach($cidades as $cidade)
            <li>{{ $cidade->nome }}</li>
        @endforeach
    </ul>
</body>
</html>
