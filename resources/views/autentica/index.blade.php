<h1>Usuários</h1>
<hr>
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