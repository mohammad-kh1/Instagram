<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{

    public $posts;

    function __construct()
    {
        $this->posts = Post::latest()->get();
    }

    public function render()
    {
        return view('livewire.home')->with(["posts"]);
    }
}
