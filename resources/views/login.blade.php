<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    @include('navegacion')
    <h1>Login aprendible</h1>
    {{--Sirve para imprimir la sesion de usuario activa--}}
    <pre>{{Auth::user()}}</pre>
    <form action="{{url('/login')}}" method="POST">
        @csrf
        <label for="email">Correo electronico</label>
        <input type="email" name="email">
        <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password">
        <br>
        <input type="submit" value="Loguearse">
    </form>


</body>
</html>