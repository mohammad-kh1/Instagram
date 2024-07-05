<div class="flex items-center gap-3 w-11/12 ml-auto py-2">
    <x-avatar src="https://picsum.photos/seed/picsum/500/500" class="w-9 h-9" />
    <div class="grid grid-cols-7 w-full gap-2">
        {{--                        comment--}}
        <div class="col-span-6 flex flex-warp text-sm">
            <p>
                                <span class="font-bold text-sm">
                                    {{$reply->user->name}}
                                </span>
            <p class="mx-2 text-black">
                {{$reply->body}}
            </p>
            </p>
        </div>
        {{--                        like--}}
        <div class="col-span-1 flex text-right justify-end mb-auto">
            <button class="font-bold text-sm ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>

            </button>
        </div>
        {{--                        footer--}}
        <div class="col-span-7 flex gap-2 text-sm items-center text-gray-700">
            <span>{{ $reply->created_at->diffForHumans()  }}</span>
            <span class="font-bold ">123 likes</span>
            <span wire:click="setParent({{$reply->id}})" class="font-semibold cursor-pointer">Reply</span>
        </div>
    </div>


</div>


@if($reply->replies->count() > 0)
    {{--                    reply--}}
    @foreach($reply->replies as $reply)
        @include("livewire.post.view.partials.reply")
    @endforeach

@endif
