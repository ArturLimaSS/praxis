<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo Logradouro</title>
</head>
<body>
    <h1>
        Tipo Logradouro
    </h1>
    <ul>
    @foreach($tipo_logradouro as $tipo)
        <li>{{$tipo->nome}}</li>
    @endforeach
    </ul>
    
</body>
</html>