<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-link-button href="{{ route('produtos.create') }}">
                        + Produto
                    </x-link-button>

                    @foreach ($produtos as $produto)
                        <div style="border: 1px solid gray; margin: 10px;">
                            <strong><label for="nome">Nome: </label></strong>
                            {{ $produto->nome }}  
                            <br>
                            <strong><label for="preco">Preço: </label></strong>
                            {{ 'R$' . number_format($produto->preco, '2', ',', '.') }}
                            <br>
                            <strong><label for="descricao">Descrição: </label></strong>
                            {{ $produto->descricao }}

                            <br>
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="" style="margin: 0 20px">
                            <br>

                            <x-link-button href="{{ route('carrinho.store', ['id' => $produto->id]) }}">
                                Adicionar ao carrinho
                            </x-link-button>
                        
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
