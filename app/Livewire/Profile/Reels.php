<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Reels extends Component
{

    public $user;

    #[On("closeModal")]
    public function reverUrl()
    {
        $this->js("history.replaceState({},'','/')");
    }

    function toggleFollow()
    {
        abort_unless(auth()->check() , 401);
        auth()->user()->toggleFollow($this->user);

    }
    function mount($user)
    {
        $this->user = User::whereUsername($user)->withCount(["followers" , "followings" , "posts"])->firstOrFail();
    }
    public function render()
    {
        $this->user = User::whereUsername($this->user->username)->withCount(["followers" , "followings" , "posts"])->firstOrFail();
        $posts = $this->user->posts()->where("type" , "reel")->get();
        return view('livewire.profile.reels')->with(["posts" => $posts ]);
    }
}
