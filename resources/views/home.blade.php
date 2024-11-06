<x-app-layout>
    @foreach ( $posts as $post)
        <x-post-card :post="$post" />
    @endforeach
    <div class="pb-12">
    {{ $posts->links() }}
    </div>
</x-app-layout>
