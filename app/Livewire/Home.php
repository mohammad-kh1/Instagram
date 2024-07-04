<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{

    public $posts;

    function __construct()
    {
        $this->posts = Post::latest()->get();
    }

    #[On("post-created")]
    public  function postCreated($id)
    {
        $post = Post::find($id);
        $this->posts = $this->posts->prepend($post);
    }

    public function render()
    {
        return view('livewire.home')->with(["posts"]);
    }
}
