<?php

namespace Foundationapp\Blog\Components;

use Livewire\Component;

class Post extends Component
{

    public $post_slug;

    public function mount($post_slug)
    {
        $this->post_slug = $post_slug;
    }

    public function render()
    {
        $post = \Foundationapp\Blog\Models\Post::where('slug', $this->post_slug)->firstOrFail();

        $view = view('blog::livewire.post', ['post' => $post]);
        
        $view->extends('layouts.marketing');

        return $view;
    }
}
