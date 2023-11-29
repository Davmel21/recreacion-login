<a href="{{url('/')}}">Inicio</a>

{{--Sirve para ocultar las paginas si el usuario es un invitado se oculta dashboard--}}
@guest
<a href="{{url('/login')}}">Login</a>
@else
<a href="{{url('/dashboard')}}">Dashboard</a>
<a href="#">Logout</a>
@endguest
@if(session('status'))
    <br>
    {{ session('status') }}
@endif
