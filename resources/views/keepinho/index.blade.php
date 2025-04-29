<h1>💡 Keepinho</h1>
<p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o Google).</p>
<hr>
<form action="{{ route('keep.gravar') }}" method="post">
    @csrf
    <textarea name="texto" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" value="Gravar nota">
</form>
<hr>

@foreach ($notas as $nota)
    <div style="border:1px dashed green;padding:2px">
        {{ $nota->texto }}
    </div>
@endforeach