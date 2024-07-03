<div class="w-full">

    {{--    Header   --}}
    <header></header>

    {{--  Main  --}}
    <main class="grid lg:grid-cols-12 gap-8 md:mt-10">
        <aside class="lg:col-span-8 border overflow-hidden h-[1000px]">
            {{--     Stories       --}}
            <section class="">
                <ul class="flex overflow-x-auto items-center gap-2 scrollbar-hide">
                    @foreach(range(1,30) as $i)
                        <li class="flex flex-col justify-center w-20 gap-1 p-2">
                            <x-avatar story src="https://picsum.photos/seed/picsum/500/500" class="h-14 w-14" />
                            <p class="text-xs font-medium truncate">{{  fake()->name }}</p>
                        </li>
                    @endforeach
                </ul>
            </section>

        </aside>

        <aside class="lg:col-span-4 border hidden lg:block p-4">


                <div class="flex items-center gap-2 p-2">
                    <x-avatar src="https://picsum.photos/seed/picsum/500/500" class="w-12 h-12" />
                    <h4>{{ fake()->name  }}</h4>
                </div>


            {{--     suggestions   --}}
            <section class="mt-4">
                    <h4 class="font-bold text-gray-700/95">Suggest for you</h4>
                    <ul class="my-2 space-y-3">
                        @foreach(range(1,10) as $index)
                            <li class="flex items-center gap-3">
                                <x-avatar src="https://picsum.photos/seed/picsum/500/500" class="w-12 h-12" />
                                <div class="grid grid-cols-7 w-full gap-2">
                                    <div class="col-span-5">
                                        <h5 class="font-semibold truncate text-sm">{{ fake()->name  }}</h5>
                                        <p class="text-xs truncate">Followd by {{ fake()->name  }}</p>
                                    </div>

                                    <div class="col-span-2 flex text-right justify-end">
                                        <button class="font-bold text-blue-500 ml-auto text-small">Follow</button>
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
