<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article / Créer un article') }}
        </h2>
    </x-slot>

    {{-- Page content --}}
    <x-slot name="slot">
        <!-- Si nous avons un Post $post -->
	    @if (isset($post))
            <!-- Le formulaire est géré par la route "posts.update" -->
            <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" >
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                @method('PUT')
        
        @else
            <!-- Le formulaire est géré par la route "posts.store" -->
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >
        @endif

            <!-- Le token CSRF -->
            @csrf

            {{-- Post title --}}
            <p>
                <label for="title" class="font-semibold">Titre</label><br/>
                <!-- S'il y a un $post->title, on complète la valeur de l'input -->
			    <input type="text" name="title" value="{{ isset($post->title) ? $post->title : old('title') }}"  id="title" placeholder="Le titre du post" >

                <!-- Le message d'erreur pour "title" -->
                @error("title")
                    <div>{{ $message }}</div>
                @enderror
            </p>

            {{-- Post image --}}
            <!-- S'il y a une image $post->picture, on l'affiche -->
            @if(isset($post->picture))
            <p>
                <span class="font-semibold">Image actuelle</span><br/>
                <img src="{{ asset('storage/'.$post->picture) }}" alt="image de couverture actuelle" style="max-height: 200px;" >
            </p>
            @endif

            <p>
                <label for="picture" class="font-semibold">Image</label><br/>
                <input type="file" name="picture" id="picture" >

                <!-- Le message d'erreur pour "picture" -->
                @error("picture")
                <div>{{ $message }}</div>
                @enderror
            </p>

            {{-- Post content --}}
            <p>
                <label for="content" class="font-semibold">Contenu</label><br/>
    
                <!-- S'il y a un $post->content, on complète la valeur du textarea -->
                <textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post" >{{ isset($post->content) ? $post->content : old('content') }}</textarea>
    
                <!-- Le message d'erreur pour "content" -->
                @error("content")
                <div>{{ $message }}</div>
                @enderror
            </p>

            <x-primary-button>
                <input type="submit" name="valider" value="Valider" >
            </x-primary-button>
        </form>
    </x-slot>

</x-app-layout>