<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{

    public $posts;

    public $canLoadMore;
    public $perPageInrements=5;
    public $perPage=10;


    #[On("closeModal")]
    public function reverUrl()
    {
        $this->js("history.replaceState({},'','/')");
    }

    public function loadMore()
    {
        if(!$this->canLoadMore){
            return null;
        }

        #increment page
        $this->perPage +=$this->perPageInrements;

        #load posts
        $this->loadPosts();
    }

    function loadPosts(){
        $this->posts = Post::with("comments.replies")->latest()->take($this->perPage)->get();
        $this->canLoadMore=(count($this->posts) >= $this->perPage );

    }

    function toggleFollow(User $user)
    {
        abort_unless(auth()->check() , 401);
        auth()->user()->toggleFollow($user);
    }

    function __construct()
    {
        $this->loadPosts();
    }

    #[On("post-created")]
    public  function postCreated($id)
    {
        $post = Post::find($id);
        $this->posts = $this->posts->prepend($post);
    }

    public function render()
    {
        $suggestedUsers = User::limit(5)->get();
        return view('livewire.home')->with(["posts" , "suggestedUsers" => $suggestedUsers]);
    }
}
