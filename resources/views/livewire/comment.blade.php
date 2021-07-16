<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl">Comments</h1>
        <form class="my-4 flex" wire:submit.prevent='addComment'>
            <div class="flex flex-col w-full space-x-4">
                <input 
                    type="text" 
                    class=" rounded border shadow p-2 mr-2 my-2" 
                    placeholder="What's in your mind." 
                    wire:model="newComment"
                    required
                >
                @error('newComment')
                    <p class="text-red-600 text-xs inline-block">{{ $message }}</p>
                @enderror
            </div>
            <div class="py-2">
                <button 
                    type="submit" 
                    class="p-2 bg-blue-500 w-20 rounded shadow text-white"
                >
                    Add
                </button>
            </div>
        </form>
        {{-- {{ dd($comment) }} --}}
        @foreach($comment as $item)
        <div class="rounded border shadow p-3 my-2">
            <div class="flex justify-between">
                <div class="flex justify-start my-2">
                    <p class="font-bold text-lg"> {{ $item->creator->name }}</p> 
                    {{--  --}}
                    <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{ $item->created_at->diffForHumans() }}</p>
                </div>
                <div 
                    class="text-red-400 hover:text-red-600 cursor-pointer" 
                    wire:click="remove({{ $item->id }})"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
            <p class="text-gray-800">{{ $item->body }} </p>
        </div>
        @endforeach
    </div>
</div>
