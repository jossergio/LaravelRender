<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Variáveis na base do Redis</title>
</head>
<body>
<h2>Variáveis na base do Redis</h2>
<table border=1>
<tr>
    <th>Variável</th>
</tr>
@foreach ($registros as $variavel)
    <tr>
        <td><a href="/redis/get/{{ $variavel }}">{{ $variavel }}</a></td>
    </tr>
@endforeach
</table>
</body>
</html>

