<!DOCTYPE html>
<html>
<head>
    <title>Evento Creado</title>
</head>
<body>
    <h1>No olvides que has programado un evento</h1>
    <p><strong>Título:</strong> {{ $title }}</p>
    <p><strong>Descripción:</strong> {{ $description }}</p>
    <p><strong>Fecha de inicio:</strong> {{ \Carbon\Carbon::parse($start)->format('d/m/Y H:i') }}</p>
    <p><strong>Fecha de fin:</strong> {{ \Carbon\Carbon::parse($end)->format('d/m/Y H:i') }}</p>
</body>
</html>