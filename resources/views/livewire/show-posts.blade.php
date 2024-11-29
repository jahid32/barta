<div class="space-y-6"><livewire:create-post />
<section id="newsfeed" class="space-y-6">
    @foreach ($posts as $post)
        <livewire:post-item :key="$post->id" :post="$post" />
    @endforeach
    {{ $posts->links() }}
</section>
</div>