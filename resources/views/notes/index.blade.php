<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
               </x-alert-success>
            <a href="{{ route('notes.create') }}" class="mb-5 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add New Notes</a>
            {{-- @foreach ($notes as $note)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $note->title }}</h2>
                   <p>{{ $note->content }}</p>
                   <p>{{ $note->updated_at->diffForHumans() }}</p>
                </div>
            </div>  
            @endforeach --}}
            @forelse ($notes as $note)
            <div class="mb-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-5 font-semibold text-xl text-gray-800 leading-tight">
                        <a href="{{ route('notes.show', $note) }}">{{ $note->title }}</a> 
                        {{-- <a href="{{ route('notes.show', $note->uuid) }}">{{ $note->title }}</a>  --}}
                    </h2>
                   {{-- <p>{{ $note->content }}</p> --}}
                   <p class="mb-5">{{ Str::limit($note->content, 200) }}</p>
                   <p class="text-sm">{{ $note->updated_at->diffForHumans() }}</p>
                </div>
            </div>  
            @empty
                <p>You have no post</p>
            @endforelse 

            {{ $notes->links() }}
        </div>
        
    </div>
</x-app-layout>
