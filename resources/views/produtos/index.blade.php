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
                            {{ $produto->nome }}  
                            <br>
                            {{ $produto->preco }}
                            <br>
                            {{ $produto->descricao }}
                            
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="" style="margin: 0 20px">
                        </div>

                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
