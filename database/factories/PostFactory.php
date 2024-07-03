<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => User::inRandomOrder()->first()->id,
            "description" => $this->faker->text(255),
            "location" => $this->faker->city,
            "hide_like_view" => $this->faker->boolean(),
            "allow_commenting" => $this->faker->boolean(),
            "type" => $this->faker->randomElement(["post", "reel"]),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function(Post  $post){
            if($post->type == "media"){
                Media::factory()->reel()->create(["mediable_type" => get_class($post) , "mediable_id" => $post->id]);
            }else{
                Media::factory()->post()->create(["mediable_type" => get_class($post) , "mediable_id" => $post->id]);

            }
        });
    }
}
