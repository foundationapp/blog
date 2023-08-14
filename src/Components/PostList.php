<?php

namespace Foundationapp\Blog\Components;

use Foundationapp\Blog\Models\Post;
use Livewire\WithPagination;
use Livewire\Component;

class PostList extends Component
{
    use WithPagination;
    
    public $numResults = 6;
    public $results;
    public $total;
    public $finished = false;
    public $sortOrder = 'desc';

    public function mount()
    {
        $this->results = $this->numResults;
        $this->total = Post::list()->count();
    }

    public function loadMore()
    {
        $this->results += $this->numResults;
        if ($this->results >= $this->total) {
            $this->finished = true;
        }
    }

    public function updateSortOrder($order)
    {
        if ($order != 'asc' && $order != 'desc') {
            return;
        }
        $this->sortOrder = $order;
    }

    public function render()
    {
        $posts = Post::query()
            // ->where(function ($query) {
            //     $query->where('title', 'like', '%' . $this->search . '%')
            //         ->orWhere('content', 'like', '%' . $this->search . '%');
            // })
            ->where('status', 'published')
            ->orderBy('created_at', $this->sortOrder)
            ->with('users')
            ->paginate($this->numResults);

        $view = view('blog::livewire.post-list', ['posts' => $posts]);

        return $view;
    }
}
