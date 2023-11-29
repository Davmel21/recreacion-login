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
    
    {{--sirve para validar si existe un error se agrega el elemento--}}
    @if ($errors->any())
    <ul>
{{--Sirve para imprimir los errores validados por el formulario--}}
@foreach ($errors->all() as $error)
    <li>
            {{$error}}
    </li>
@endforeach
</ul>
@endif    

{{--Sirve para imprimir la sesion de usuario activa--}}
    <pre>{{Auth::user()}}</pre>
    <form action="{{url('/login')}}" method="POST">
        @csrf
      
        <label for="email">Correo electronico</label>
        <input type="email" name="email" value="{{old('email')}}">
     {{--Imprime el mensaje de error del campo en especifico--}}
    @error('email')
    {{$message}}
@enderror
        <br>
        
        <label for="password">Contraseña</label>
        <input type="password" name="password" >
        @error('password')
        {{$message}}
    @enderror
        <br>
        <input type="submit" value="Loguearse">
    </form>


</body>
</html>