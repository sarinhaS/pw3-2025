<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Carrinho
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(count($carrinho) > 0)
                        @foreach ($carrinho as $id => $item)
                            <div style="border: 1px solid gray; margin: 10px;">
                                <strong><label for="nome">Nome: </label></strong>
                                {{ $item['nome'] }}  
                                <br>
                                <strong><label for="preco">Preço:</label></strong>

                                {{ 'R$' . number_format($item['preco'], 2, ',', '.') }}
                                <br>
                                <strong><label for="descricao">Descrição: </label></strong>
                                {{ $item['descricao'] }}
                                <br>
                                <img src="{{ asset('storage/' . $item['imagem']) }}" alt="" style="margin: 0 20px">
                                <br>
                                <x-link-button href="{{ route('carrinho.delete', ['id' => $id]) }}">
                                    Remover do carrinho
                                </x-link-button>
                            </div>
                        @endforeach
                    @else
                        <strong>Não há nada no seu carrinho!</strong>
                    @endif

                    <br><br>
                    
                    <x-link-button href="{{ route('produtos.index') }}">
                        Voltar à página principal
                    </x-link-button>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
