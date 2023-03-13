<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog / Tous les articles') }}
        </h2>
    </x-slot>

    {{-- Page content : affichage de tous les articles --}}
    <x-slot name="slot">

        <div>
            <!-- Lien pour créer un nouvel article : "posts.create" -->
            <x-primary-button>
                <a href="{{ route('posts.create') }}" title="Créer un article" >Créer un nouvel article</a>
            </x-primary-button>
        </div>

        <!-- Le tableau pour lister les articles/posts -->
        <table border="1" >
            <thead>
                <tr>
                    <th>Titre</th>
                    <th colspan="2" >Opérations</th>
                </tr>
            </thead>
            <tbody>
                <!-- On parcourt la collection de Post -->
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <!-- Lien pour afficher un Post : "posts.show" -->
                        <a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->title }}</a>
                    </td>
                    <td>
                        <!-- Lien pour modifier un Post : "posts.edit" -->
                        <x-secondary-button>
                            <a href="{{ route('posts.edit', $post) }}" title="Modifier l'article" >Modifier</a>
                        </x-secondary-button>
                    </td>
                    <td>
                        <!-- Formulaire pour supprimer un Post : "posts.destroy" -->
                        <form method="POST" action="{{ route('posts.destroy', $post) }}" >
                            <!-- CSRF token -->
                            @csrf
                            {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                            @method("DELETE")
                            <x-danger-button>
                                <input type="submit" value="Supprimer" >
                            </x-danger-button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>
