<div class="w-full">

    {{--    Header   --}}
    <header></header>

    {{--  Main  --}}
    <main class="grid lg:grid-cols-12 gap-8 md:mt-10">
        <aside class="lg:col-span-8 border overflow-hidden h-[1000px]">
            {{--     Stories       --}}
            <section class="">
                <ul class="flex overflow-x-auto items-center gap-2">
                    <li class="flex flex-col justify-center w-20 gap-1 p-2">
                        <x-avatar story src="https://picsum.photos/seed/picsum/500/500" class="h-14 w-14" />
                        <p class="text-xs font-medium truncate">{{  fake()->name }}</p>
                    </li>
                    @foreach(range(1,30) as $i)
                        <li class="flex flex-col justify-center w-20 gap-1 p-2">
                            <x-avatar story src="https://picsum.photos/seed/picsum/500/500" class="h-14 w-14" />
                            <p class="text-xs font-medium truncate">{{  fake()->name }}</p>
                        </li>
                    @endforeach
                </ul>
            </section>

        </aside>

        {{--     suggestions   --}}
        <aside class="lg:col-span-4 border hidden lg:block p-4">

        </aside>
    </main>
</div>
