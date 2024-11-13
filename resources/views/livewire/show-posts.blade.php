<div class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
    @foreach ($posts as $post)
        <livewire:post-item :key="$post->id" :post="$post" />
    @endforeach
    {{ $posts->links() }}
</div>
