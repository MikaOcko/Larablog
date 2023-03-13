<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article / Afficher un article') }}
        </h2>
    </x-slot>

    {{-- Page content --}}
    <x-slot name="slot">
        <h1><span class="font-semibold">Titre : </span>{{ $post->title }}</h1>

	    <img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">

	    <div><span class="font-semibold">Message : </span>{{ $post->content }}</div>

	    <x-primary-button>
            <a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux articles</a>
        </x-primary-button>
    </x-slot>

</x-app-layout>