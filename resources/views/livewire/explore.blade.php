<div class="my-5 lg:px-8">

    <ul class="grid grid-cols-3 sm:gap-3">
        @foreach($posts as $post)
        @php

        $cover = $post->media()->first();

        @endphp
            <li
                onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{$post->id}}}})"
                class="h-28 sm:h-80 w-full cursor-pointer border rounded bg-black relative items-center flex justify-center group">

{{--                hover show comments and like--}}
                <div class="hidden group-hover:flex transition-all absolute inset-x-0 m-auto z-10 max-w-fit items-center gap-2">
{{--                    like count--}}
                    <div class="flex items-center gap-2 text-white font-bold">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                              <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                            </svg>

                        </span>
                        {{$post->likers->count()}}
                    </div>
{{--                    commnet count--}}
                    <div class="flex items-center gap-2 text-white font-bold">
                        <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                          <path fill-rule="evenodd" d="M5.337 21.718a6.707 6.707 0 0 1-.533-.074.75.75 0 0 1-.44-1.223 3.73 3.73 0 0 0 .814-1.686c.023-.115-.022-.317-.254-.543C3.274 16.587 2.25 14.41 2.25 12c0-5.03 4.428-9 9.75-9s9.75 3.97 9.75 9c0 5.03-4.428 9-9.75 9-.833 0-1.643-.097-2.417-.279a6.721 6.721 0 0 1-4.246.997Z" clip-rule="evenodd" />
                        </svg>

                        </span>
                        {{$post->comments->count()}}
                    </div>
                </div>

{{--                icons--}}
{{--if post && has mutiple media--}}
                @if($post->type=="post" && $post->media->count() > 1)

                    <div class="absolute top-4 right-4 z-10 text-white">
                        <span>

                                <path d="m16 12.9v4.2c0 3.5-1.4 4.9-4.9 4.9h-4.2c-3.5 0-4.9-1.4-4.9-4.9v-4.2c0-3.5 1.4-4.9 4.9-4.9h4.2c3.5 0 4.9 1.4 4.9 4.9z"/>
                                <path d="m17.0998 2h-4.2c-3.08312 0-4.52906 1.09409-4.83029 3.73901-.06302.55334.39525 1.01099.95216 1.01099h2.07813c4.2 0 6.15 1.95 6.15 6.15v2.0781c0 .5569.4576 1.0152 1.011.9522 2.6449-.3013 3.739-1.7472 3.739-4.8303v-4.2c0-3.5-1.4-4.9-4.9-4.9z"/></g>
                        </svg>

                        </span>
                    </div>

                @endif
                @if($post->type =="reel")
                    <div class="absolute top-4 right-4 z-10 text-white">
                        <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="24" height="24" fill="currentColor"
                                                         id="instagram-reel">
                        <path fill="currentColor" fill-rule="evenodd"
                              d="M1 6.5A5.5 5.5 0 0 1 6.5 1h11A5.5 5.5 0 0 1 23 6.5v11a5.5 5.5 0 0 1-5.5 5.5h-11A5.5 5.5 0 0 1 1 17.5v-11ZM6.5 3A3.5 3.5 0 0 0 3 6.5v11A3.5 3.5 0 0 0 6.5 21h11a3.5 3.5 0 0 0 3.5-3.5v-11A3.5 3.5 0 0 0 17.5 3h-11Z"
                              clip-rule="evenodd"></path>
                        <path fill="currentColor" fill-rule="evenodd"
                              d="M9.038 10.113a1 1 0 0 1 1.035.068l5 3.5a1 1 0 0 1 0 1.638l-5 3.5A1 1 0 0 1 8.5 18v-7a1 1 0 0 1 .538-.887zm1.462 2.808v3.158l2.256-1.579-2.256-1.58zM1 8a1 1 0 0 1 1-1h20a1 1 0 1 1 0 2H2a1 1 0 0 1-1-1z"
                              clip-rule="evenodd"></path>
                        <path fill="#000" fill-rule="evenodd"
                              d="M7.684 1.051a1 1 0 0 1 1.265.633l2 6a1 1 0 0 1-1.897.632l-2-6a1 1 0 0 1 .632-1.265zm6 0a1 1 0 0 1 1.265.633l2 6a1 1 0 0 1-1.897.632l-2-6a1 1 0 0 1 .632-1.265z"
                              clip-rule="evenodd"></path>
                    </svg>
                        </span>
                    </div>
                    @endif
                @switch($cover->mime)
                    @case("video")
                        <x-video :control="false" :cover="true" source="{{$cover->url}}" />
                        @break
                    @case("image")
                        <img src="{{$cover->url}}" alt="image" class="h-full w-full object-cover">
                        @break
                    @default

                @endswitch
        </li>
        @endforeach

    </ul>

</div>
