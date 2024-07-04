<?php

namespace App\Livewire\Post;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Livewire\Attributes\Validate;

class Create extends ModalComponent
{

    use WithFileUploads;

    #[Validate(["media.*"=>[
        "required",
        "file",
        "mimes:png,jpeg,jpg,mp4,mov",
        "max:10000"],
    ])]
    public $media = [];

    public $description;

    public $location;

    #[Validate("boolean")]
    public $hide_like_view=false;

    #[Validate("boolean")]
    public $allow_commenting=false;

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    public function submit()
    {
        $this->validate();
        $type = $this->getPostType($this->media);

        # create post
        $post = Post::create([
            "user_id" => auth()->user()->id,
            "description" => $this->description,
            "location" => $this->location,
            "allow_commenting" => $this->allow_commenting,
            "hide_like_view" => $this->hide_like_view,
            "type" => $type
            ]);

        foreach ($this->media as $key=>$media){
            #get mime
            $mime = $this->getMime($media);

            #save to storage

            $path = $media->store("media" , "public");

            $url = url(Storage::url($path));

            #create media
            Media::create([
                "url" => $url,
                "mime"=> $mime,
                "mediable_id" => $post->id,
                "mediable_type" => Post::class,

            ]);

            $this->reset();
            $this->dispatch("close");

            #dispatch event for post created
        $this->dispatch("post-created" , $post->id);
        }
    }

    public function getMime($media)
    {
        if(str()->contains($media->getMimeType() , "video" )){
            return "video";
        }else{
            return "image";
        }
    }

    public function getPostType($media)
    {
        if(count($media) === 1 && str()->contains($media[0]->getMimeType() , "video"))
        {
            return "reel";
        }else{
            return "post";
        }
    }

    public function render()
    {
        return view('livewire.post.create')->with(["media" , "description" , "locaiton" , "hide_like_view" , "allow_commenting"]);
    }


}
