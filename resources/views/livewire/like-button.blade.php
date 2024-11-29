<div>
    <button wire:click="toggleLike" 
            class="px-4 py-2 rounded 
                   {{ $isLiked ? 'bg-blue-500 text-white' : 'bg-gray-300 text-black' }}">
        👍 {{ $likesCount }}
    </button>
</div>
