<?php

namespace App\Livewire\Post\View;

use App\Models\Post;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{

    public $post;


    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function modalMaxWidth(): string
    {
        return "5xl";
    }

    public function mount()
    {
        $this->post = Post::findOrFail($this->post);

        $url = url("post/".$this->post->id);
        $this->js("history.pushState({},'','{$url}')");


    }

    public function render()
    {
        return <<<'BLADE'
        <main class="bg-white h-[calc(100vh_-_3.5rem)] md:h-[calc(100vh_-_5rem)] flex flex-col border gap-y-4 px-5">

            <livewire:post.view.item :post="$this->post" />
        </main>
        BLADE;
    }
}
