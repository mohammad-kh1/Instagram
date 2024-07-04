<?php

namespace App\Livewire\Post;

use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{

    use WithFileUploads;

    public $media = [];
    public $description;
    public $location;
    public $hide_like_view;
    public $allow_commenting;

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    public function submit()
    {
        dd($this->media , $this->description , $this->location , $this->hide_like_view , $this->allow_commenting);
    }

    public function render()
    {
        return view('livewire.post.create')->with(["media" , "description" , "locaiton" , "hide_like_view" , "allow_commenting"]);
    }


}
