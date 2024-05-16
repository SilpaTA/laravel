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
            
            <div class="mb-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-5 font-bold text-4xl ">
                        {{ $notes->title }}
                    </h2>
                   {{-- <p>{{ $note->content }}</p> --}}
                   <p class="mb-5 whitespace-pre-wrap">{{ $notes->content }}</p>
                   <div class="inline-flex">
                    <p class="text-sm "><strong>Created:-</strong>{{ $notes->created_at->diffForHumans() }}</p>
                    <p class="text-sm ml-12"><strong>Updated:-</strong>{{ $notes->updated_at->diffForHumans() }}</p>
                    <a href="{{ route('notes.edit', $notes) }}" class="ml-12 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Edit Note
                    </a>
                    <form action="{{ route('notes.destroy', $notes) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button 
                        class="ml-12 btn-danger inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 
                        focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                        onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                   </div>
                   
                </div>
            </div>  
           
        </div>
        
    </div>
</x-app-layout>
