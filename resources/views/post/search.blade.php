<x-app-layout>
    @foreach ( $posts as $post)
    {{ $post->user->first_name }}
        <x-post-card :post="$post" />
    @endforeach
</x-app-layout>
