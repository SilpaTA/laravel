<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            
            <div class="mb-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-5 font-bold text-4xl ">
                        {{ $notes->title }}
                    </h2>
                   {{-- <p>{{ $note->content }}</p> --}}
                   <p class="mb-5 whitespace-pre-wrap">{{ $notes->content }}</p>
                   <p class="text-sm "><strong>Created:-</strong>{{ $notes->created_at->diffForHumans() }}</p>
                   <p class="text-sm "><strong>Updated:-</strong>{{ $notes->updated_at->diffForHumans() }}</p>
                </div>
            </div>  
           
        </div>
        
    </div>
</x-app-layout>