<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-link-button href="{{ route('produtos.create') }}">
                        + post
                    </x-link-button>
                    <h1>Posts da categoria : {{ $categoria->name }}</h1>

                    @foreach ($posts as $post)
                       <h2><b><a href="{{ route('blog.post', $post->id) }}"> {{ $post->title }}</a></b></h2>

                       <p style="color:gray; margin-left:10px">{{ $post->content }}</p>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>