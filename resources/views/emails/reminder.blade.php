
<!DOCTYPE html>
<html>
<head>
    <title>Recordatorio de Evento</title>
</head>
<body>
    <h1>Hola, {{ $userName }}!</h1>
    <p>Este es un recordatorio para tu próximo evento: {{ $eventTitle }}</p>
    <p>{{ $eventDescription }}</p>
    <p>El evento está programado para comenzar el: {{ $eventStartDate }}</p>
    <p>¡No olvides asistir!</p>
</body>
</html>
