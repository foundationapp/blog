<?php

namespace Foundationapp\Blog\Components;

use \Foundationapp\Blog\Models\Post;
use Livewire\Component;

class Dashboard extends Component
{

    public $posts;
    public $search = null;
    public $status = null;
    public $orderAsc = false;
    public $orderBy = 'desc';

    public function mount()
    {
        $this->posts = $this->getPosts();
    }

    public function getPosts()
    {
        $this->posts = Post::where('user_id', auth()->user()->id);
        if ($this->status) {
            $this->posts = $this->posts->where('status', $this->status);
        }
        if ($this->search) {
            $this->posts = $this->posts->where('title', 'like', '%' . $this->search . '%');
        }
        if ($this->orderAsc) {
            $this->orderBy = 'asc';
        } else {
            $this->orderBy = 'desc';
        }
        $this->posts = $this->posts->orderBy('created_at', $this->orderBy)->get();
        return $this->posts;
    }

    public function deletePost($id)
    {
        $post = Post::where('id', $id)->where('user_id', auth()->user()->id)->firstOrFail();
        if ($post) {
            $post->delete();
            $this->posts->forget($id);
        }
    }

    public function render()
    {

        $this->getPosts();

        $view = view('blog::livewire.dashboard');

        $view->extends('layouts.app');

        return $view;
    }
}
