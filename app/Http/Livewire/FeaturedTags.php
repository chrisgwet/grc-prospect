<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FeaturedTags extends Component
{

    public $tag;
    public $propriete;

    public function mount(){
        if($this->propriete->featured === false){
            $this->tag = 'far fa-star';
        }else{
            $this->tag = 'fas fa-star';
        }
    }

    public function changeFeatured()
    {
        if($this->propriete->featured === false){
            $this->tag = 'fas fa-star';
            $this->propriete->featured = true;
        }else{
            $this->tag = 'far fa-star';
            $this->propriete->featured = false;
        }
        $this->propriete->update();
    }

    public function render()
    {
        return view('livewire.featured-tags');
    }
}
