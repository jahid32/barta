<!-- Barta Card -->
<article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
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
        <a 
          href="{{ route('profile.show', $post->user->id) }}"
          class="hover:underline font-semibold line-clamp-1">
          {{ $post->user->full_name }}
        </a>

        <a
          href="{{ route('profile.show', $post->user->id) }}"
          class="hover:underline text-sm text-gray-500 line-clamp-1">
          {{ $post->user->username ?? $post->user->email }}
        </a>
      </div>
      <!-- /User Info -->
    </div>

    <!-- Card Action Dropdown -->
    @if (Auth::user()->id === $post->user_id)
    <div class="flex flex-shrink-0 self-center" x-data="{ open: false }">
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
          >Edit</a
          >
          <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('DELETE')

              <x-dropdown-link :href="route('posts.destroy', $post)"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();">
                  {{ __('Deletet') }}
              </x-dropdown-link>
          </form>
          {{-- <a
                  href="{{ route('posts.destroy', $post) }}"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  role="menuitem"
                  tabindex="-1"
                  id="user-menu-item-1"
          >Delete</a> --}}

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
  {{-- @TODO Add view count --}}
  {{-- <span class="">•</span>
  <span>450 views</span> --}}
   @if (!request()->routeIs('posts.show'))
    <div class="flex flex-shrink-0 self-center">
      <a href="{{ route('posts.show', $post) }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.005 1.005 0 0 0 .87 1.108l7.036 3.036a1.005 1.005 0 0 0 1.108-.87l3.036-7.036a1.005 1.005 0 0 0-.87-1.108L12.322 9.88c-.73-.73-.73-1.93 0-2.66l7.036-3.036a1.005 1.005 0 1 0-.87-1.108l-3.036 7.036a1.005 1.005 0 0 0 .87 1.108L21.708 12.322a1.005 1.005 0 0 0 .87 1.108v.002zm-10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
        </svg>
      </a>
    </div>
    @endif
</div>


<!-- Barta Card Bottom -->
<footer class="border-t border-gray-200 pt-2">
  <!-- Card Bottom Action Buttons -->
  {{-- @TODO Add like and comment buttons --}}
  {{-- <div class="flex items-center justify-between">
    <div class="flex gap-8 text-gray-600">
      <!-- Heart Button -->
      <button
        type="button"
        class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800">
        <span class="sr-only">Like</span>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="2"
          stroke="currentColor"
          class="w-5 h-5">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
        </svg>

        <p>36</p>
      </button>
      <!-- /Heart Button -->

      <!-- Comment Button -->
      <button
        type="button"
        class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800">
        <span class="sr-only">Comment</span>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="2"
          stroke="currentColor"
          class="w-5 h-5">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
        </svg>

        <p>17</p>
      </button>
      <!-- /Comment Button -->
    </div>

    <div>
      <!-- Share Button -->
      <button
        type="button"
        class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800">
        <span class="sr-only">Share</span>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-5 h-5">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
        </svg>
      </button>
      <!-- /Share Button -->
    </div>
  </div> --}}
  <!-- /Card Bottom Action Buttons -->
</footer>
<!-- /Barta Card Bottom -->
</article>
<!-- /Barta Card -->