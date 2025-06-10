<h1>Usuários</h1>
<<<<<<< HEAD
<hr>
=======
@if (Auth::user())
    Olá {{ Auth::user()->name }}.
    <a href="{{ route('autentica.logout') }}">Sair</a>
@else
    Você não está autenticado.
    <a href="{{ route('autentica.login') }}">Entrar</a>
@endif
<hr>

>>>>>>> 89b648e6b4a02f855ac6e3360c6b4601fe7cfa3e
@if ($errors->any())
<div style="color:red">
    <h3>Erro!</h3>
    
    <ul>
        @foreach ($errors->all() as $err)
        <li>{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif
<<<<<<< HEAD
<hr>
<form action="{{ route('autentica.gravar') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome">
    <br>
    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
    <br>
    <input type="password" name="password_confirmation" placeholder="Senha">
    <br>
    <input type="submit" value="Gravar">
</form>
=======

<form action="{{ route('autentica.gravar') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
    <br>
    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
    <br>
    <input type="password" name="password" placeholder="Senha">
    <br>
    <input type="password" name="password_confirmation" placeholder="Confirme a senha">
    <br>
    <input type="submit" value="Gravar">
</form>
<hr>

<ul>
@foreach ($usuarios as $user)
    <li>{{ $user->name }}</li>
@endforeach
</ul>
>>>>>>> 89b648e6b4a02f855ac6e3360c6b4601fe7cfa3e
