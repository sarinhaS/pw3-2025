<h1>💡 Keepinho</h1>
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
<form method="post" action="{{ route('keep.editarGravar') }}">
    <!-- Altera para método PUT -->
    @method('PUT')
    @csrf

    <input type="text" name="titulo" placeholder="Título da nota" value="{{ old('titulo', $nota->titulo) }}">
    <br>
    <input type="hidden" name="id" value="{{ $nota->id }}">
    <textarea name="texto" cols="30" rows="10">{{ old('texto', $nota->texto) }}</textarea>
    <br>
    <input type="submit" value="Editar nota">
</form>