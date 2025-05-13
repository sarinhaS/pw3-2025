<h1>💡 Keepinho</h1>
<p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o Google).</p>
<hr>
@if ($errors->any())
<div style="color:red">
    <h3>Erro!</h3>
</div>
@endif
<form action="{{ route('keep.gravar') }}" method="post">
    @csrf
    <input type="text" name="titulo" placeholder="Título da nota">
    <br>
    <textarea name="texto" cols="30" rows="10" placeholder="Digite sua nota aqui..."></textarea>
    <br>
    <input type="submit" value="Gravar nota">
</form>
<hr>

@foreach ($notas as $nota)
    <div style="border:1px dashed green;padding:2px">
        {{ $nota->texto }}
        <br>
        <!-- Editar -->
        <a href="{{ route('keep.editar', $nota->id) }}">Editar</a>
        <br>
        
        <!-- Excluir -->
        <form action="{{ route('keep.apagar', $nota->id) }}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Apagar">
        </form>

    </div>
@endforeach