{{-- Page content --}}
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Larablog') }}
        </h2>
        <p>Un blog codé avec Laravel 10</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    {{ __("Mangeur de couscous") }}
                    
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
            <h1 class="text-center font-semibold text-xl"> Mangeur de couscous</h1>
        </div>
    </div>

    <x-danger-button/>
    <x-primary-button>
        <p>Lorem ipsum dolor sit amet.</p>
    </x-primary-button>
    <x-secondary-button>
        <p>Lorem ipsum dolor sit amet.</p>
    </x-secondary-button>
    

</x-app-layout>