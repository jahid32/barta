<x-app-layout>
    <section
        class="bg-white border-2 p-8 border-gray-800 rounded-xl min-h-[400px] space-y-8 flex items-center flex-col justify-center">
        <!-- Profile Info -->

        <div class="flex gap-4 justify-center flex-col text-center items-center">
            <!-- Avatar -->
            @if ($user->avatar)
                <div class="relative">
                    <img class="w-32 h-32 rounded-full border-2 border-gray-800" src="{{ $user->avatar_url }}" 
                        alt="{{ $user->first_name }}" />
                    <span
                        class="bottom-2 right-4 absolute w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                </div>
            @endif
            <!-- /Avatar -->

            <!-- User Meta -->
            <div>

                <h1 class="font-bold md:text-2xl">{{ $user->full_name }}</h1>
                @if ($user->bio)
                    <div class="text-gray-700">{{ $user->bio }} </div> 
                @endif
               
            </div>
            <!-- / User Meta -->
        </div>
        <!-- /Profile Info -->



        <!-- Edit Profile Button (Only visible to the profile owner) -->
        <a href="{{ route('profile.edit') }}" type="button"
            class="-m-2 flex gap-2 items-center rounded-full px-4 py-2 font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
            </svg>

            Edit Profile
        </a>
        <!-- /Edit Profile Button -->
    </section>
  <!-- /Cover Container -->
  <x-create-post />
 
  @foreach ($posts as $post)
    <x-post-card :post="$post" />
  @endforeach
</x-app-layout>