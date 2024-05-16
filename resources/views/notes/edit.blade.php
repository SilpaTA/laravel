<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach --}}
                    <form action="{{ route('notes.update', $notes) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <x-input type="text"
                                name="title" 
                                field="title" 
                                placeholder="Title" 
                                class="mb-5 w-full" 
                                :value="@old('title', $notes->title)">
                        </x-input>
                        {{-- @error('title')
                            <p> {{ $message }}</p>
                        @enderror --}}
                        <x-textarea 
                            name="content" 
                            field="content" 
                            placeholder="Content" 
                            class="mb-5 w-full" 
                            :value="@old('content', $notes->content)">
                        </x-textarea>
                        {{-- @error('content')
                           <p> {{ $message }}</p>
                        @enderror --}}
                        <x-button>Save Note</x-button>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
