<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $url = $this->getUrl("post");
        $mime = $this->getMime($url);

        return [
            "url" => $url,
            "mime" => $mime,
            "mediable_id" => Post::factory(),
            "mediable_type" => function (array $attrs) {
                return Post::find($attrs["mediable_id"])->getMorphClass();
            }
        ];
    }
    public function getUrl($type = "post")
    {
        switch ($type)
        {
            case "post":
                $urls = [
                    "https://sample-videos.com/video321/mp4/720/big_buck_bunny_720p_1mb.mp4",
                    "https://fastly.picsum.photos/id/13/367/267.jpg?hmac=PlowotpQVsKI5u9zmCSxPrAdWuH7CqFxaqGgk5IbLtk" ,
                    "https://sample-videos.com/video321/mp4/720/big_buck_bunny_720p_1mb.mp4" ,
                    "https://fastly.picsum.photos/id/13/367/267.jpg?hmac=PlowotpQVsKI5u9zmCSxPrAdWuH7CqFxaqGgk5IbLtk",

                ];
                return $this->faker->randomElement($urls);
            case "reel":
                $urls = [
                    "https://sample-videos.com/video321/mp4/720/big_buck_bunny_720p_1mb.mp4",
                    "https://fastly.picsum.photos/id/13/367/267.jpg?hmac=PlowotpQVsKI5u9zmCSxPrAdWuH7CqFxaqGgk5IbLtk" ,
                    "https://fastly.picsum.photos/id/13/367/267.jpg?hmac=PlowotpQVsKI5u9zmCSxPrAdWuH7CqFxaqGgk5IbLtk" ,
                    "https://sample-videos.com/video321/mp4/720/big_buck_bunny_720p_1mb.mp4",
                ];
                return $this->faker->randomElement($urls);
            default:
                break;

        }
    }

    public function getMime($url){
        if(str()->contains($url , "big_buck_bunny")){
            return "video";
        }else if(str()->contains($url , "fastly.picsum.photos")){
            return "image";
        }
    }

    #chainable methods
    public function reel()
    {
        $url = $this->getUrl('reel');
        $mime = $this->getMime($url);

        return $this->state(function(array $attrs) use($url, $mime){
            return [
                "mime" => $mime,
                "url" => $url,
            ];
        });
    }



    #chainable methods
    public function post()
    {
        $url = $this->getUrl('post');
        $mime = $this->getMime($url);

        return $this->state(function(array $attrs) use($url, $mime){
            return [
                "mime" => $mime,
                "url" => $url,
            ];
        });
    }
}
