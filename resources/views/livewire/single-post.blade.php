<!-- Newsfeed -->
<section id="newsfeed" class="space-y-6">

<!-- Barta Card -->
<article
    class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
    <!-- Barta Card Top -->
    <header>
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
        <!-- User Avatar -->
        <div class="flex-shrink-0">
             <img
          class="h-10 w-10 rounded-full object-cover"
          src="{{ $post->user->avatar_url }}"
          alt="{{ $post->user->full_name }}" />
        </div>
        <!-- /User Avatar -->

        <!-- User Info -->
        <div class="text-gray-900 flex flex-col min-w-0 flex-1">
             <a href="{{ route('profile.show', $post->user->id) }}" class="hover:underline font-semibold line-clamp-1">
                 {{ $post->user->full_name }}
            </a>

            <a href="{{ route('profile.show', $post->user->id) }}" class="hover:underline text-sm text-gray-500 line-clamp-1">
                {{ $post->user->username ?? $post->user->email }}
            </a>
        </div>
        <!-- /User Info -->
        </div>

        <!-- Card Action Dropdown -->
        @if (Auth::user()->id === $post->user_id)
        <div
                class="flex flex-shrink-0 self-center"
                x-data="{ open: false }">
        <div class="relative inline-block text-left">
            <div>
            <button
                    @click="open = !open"
                    type="button"
                    class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600"
                    id="menu-0-button">
                <span class="sr-only">Open options</span>
                <svg
                        class="h-5 w-5"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true">
                <path
                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"></path>
                </svg>
            </button>
            </div>
            <!-- Dropdown menu -->
            <div
                    x-show="open"
                    @click.away="open = false"
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu"
                    aria-orientation="vertical"
                    aria-labelledby="user-menu-button"
                    tabindex="-1">
            <a
                  href="{{ route('posts.edit', $post) }}"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  role="menuitem"
                  tabindex="-1"
                  id="user-menu-item-0"
          >Edit</a>
            <a
                    href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    role="menuitem"
                    tabindex="-1"
                    id="user-menu-item-1"
            >Delete</a
            >
            </div>
        </div>
        </div>
        @endif
        <!-- /Card Action Dropdown -->
    </div>
    </header>

    <!-- Content -->
    <div class="py-4 text-gray-700 font-normal">
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="w-full object-cover" />
    @endif
    <a href="{{ route('posts.show', $post) }}">
        {{ $post->content }}
        </a>
    </div>

    <!-- Date Created & View Stat -->
    <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
    <span class="">{{ $post->created_at->diffForHumans() }}</span>
    <span class="">•</span>
    <span>{{ $post->comments->count() }} comments</span>
    <span class="">•</span>
    <span>{{ $post->likes->count() }} Likes</span>
    </div>

    <hr class="my-6" />

   <livewire:post-comment :post="$post" />
    <!-- /Barta Card Bottom -->
</article>
<!-- /Barta Card -->

<hr />

<livewire:comment-list :comments="$post->comments" :post="$post" />
</section>
<!-- /Newsfeed -->