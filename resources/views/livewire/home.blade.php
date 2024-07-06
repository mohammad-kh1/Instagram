<div
    x-data ="{
        canLoadMore:@entangle('canLoadMore')
    }"

    @scroll.window.trottle="
        scrollTop = window.scrollY || window.scrollTop;
        divHeight = window.innerHeight || document.documentElement.clientHeight;
        scrollHeight = document.documentElement.scrollHeight;

        isScrolled = scrollTop+divHeight >= scrollHeight-1;
        if(isScrolled && canLoadMore){
            @this.loadMore();
        }
       "

    class="w-full h-ful">

    {{--    Header   --}}
    <header class="md:hidden sticky top-0 bg-white">
        <div class="grid grid-cols-12 gap-2 items-center">
            <div class="col-span-3">
                <img src="{{ asset('assets/logo.png')  }}" class="h-12 max-w-lg w-full" alt="logo">
            </div>
            <div class="col-span-8 flex justify-center px-2">
                <input type="text" placeholder="Search" class="border-0 outline-none w-full focus:outline-none bg-gray-100 rounded-lg focus:ring-0 hover:ring-0">
            </div>
            <div class="col-span-1 flex justify-center">
                <a href="#">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.4" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </header>

    {{--  Main  --}}
    <main class="grid lg:grid-cols-12 gap-8 md:mt-10">
        <aside class="lg:col-span-8 overflow-hidden">
            {{--     Stories       --}}
            <section class="">
                <ul class="flex overflow-x-auto items-center gap-2 scrollbar-hide">
                    @foreach(range(1,30) as $i)
                        <li class="flex flex-col justify-center w-20 gap-1 p-2">
                            <x-avatar wire:ignore story src="https://picsum.photos/seed/picsum/500/500" class="h-14 w-14" />
                            <p class="text-xs font-medium truncate" wire:ignore>{{  fake()->name }}</p>
                        </li>
                    @endforeach
                </ul>
            </section>

            {{--     Posts       --}}

            <section class="mt-5 space-y-4 p-2">

                @if($posts)

                    @foreach($posts as $post)

                        <livewire:post.item wire:key="post-{{$post->id}}" :post="$post"/>

                    @endforeach

                @else
                    <p class="font-bold felx justify-center">
                        No Posts Uploaded
                    </p>
                @endif
            </section>
        </aside>

        <aside class="lg:col-span-4 hidden lg:block p-4">


                <div class="flex items-center gap-2 p-2">
                    <x-avatar wire:ignore src="https://picsum.photos/seed/picsum/500/500" class="w-12 h-12" />
                    <h4 wire:ignore>{{ fake()->name  }}</h4>
                </div>


            {{--     suggestions   --}}
            <section class="mt-4">
                    <h4 class="font-bold text-gray-700/95">Suggest for you</h4>
                    <ul class="my-2 space-y-3">
                        @foreach($suggestedUsers as $user)
                            <li class="flex items-center gap-3">
                                <x-avatar wire:ignore src="https://picsum.photos/seed/picsum/500/500" class="w-12 h-12" />
                                <div class="grid grid-cols-7 w-full gap-2">
                                    <div class="col-span-5">
                                        <h5 class="font-semibold truncate text-sm" wire:ignore>{{ $user->name  }}</h5>
                                        <p class="text-xs truncate" wire:ignore>Followd by {{ fake()->name  }}</p>
                                    </div>

                                    <div class="col-span-2 flex text-right justify-end">
                                        @if(auth()->user()->isFollowing($user))
                                        <button wire:click="toggleFollow({{$user->id}})" class="font-bold text-blue-500 ml-auto text-small">Following</button>
                                        @else
                                            <button wire:click="toggleFollow({{$user->id}})" class="font-bold text-blue-500 ml-auto text-small">Follow</button>

                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </section>

            <section class="mt-5">
                <ol class="flex gap-2 flex-wrap">
                    <li class="text-xs text-gray-800/90 font-medium">
                        <a class="hover:underline" href="#">About</a>
                    </li>
                    <li class="text-xs text-gray-800/90 font-medium">
                        <a class="hover:underline" href="#">Help</a>
                    </li>
                    <li class="text-xs text-gray-800/90 font-medium">
                        <a class="hover:underline" href="#">Api</a>
                    </li>
                    <li class="text-xs text-gray-800/90 font-medium">
                        <a class="hover:underline" href="#">Jobs</a>
                    </li>
                    <li class="text-xs text-gray-800/90 font-medium">
                        <a class="hover:underline" href="#">Privacy</a>
                    </li>
                    <li class="text-xs text-gray-800/90 font-medium">
                        <a class="hover:underline" href="#">Terms</a>
                    </li>
                    <li class="text-xs text-gray-800/90 font-medium">
                        <a class="hover:underline" href="#">Location</a>
                    </li>
                </ol>
                <h3>Instagram Clone @2024</h3>
            </section>
        </aside>
    </main>
</div>
