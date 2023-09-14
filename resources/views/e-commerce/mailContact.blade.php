<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Se ha guardado la review correctamente :)</title>
</head>
<body>
    <p>Se ha generado una solicitud de contacto el día: {{$contact->created_at}}.</p>
    <p>Agradecemos su interes y estaremos comunicandonos tan pronto como sea posible</p>
    <p>Estos fueron los datos generados:</p>
    <ul>
        <li>Nombre: {{ $contact->name }}</li>
        <li>Asunto {{ $contact->subject }}</li>
        <li>Mensaje {{ $contact->message }}</li>
    </ul>
</body>

</html>
