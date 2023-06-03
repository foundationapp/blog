<?php

namespace Foundationapp\Blog\Components;

use Foundationapp\Blog\Models\Post;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Validator;

class PostsEditor extends Component
{
    use WithFileUploads;

    public $post;
    public $image;
    public $post_id;

    protected $rules = [
        'post.title' => 'required|min:6',
        'post.body' => '',
        'post.image' => '',
        'post.slug' => '',
        'post.excerpt' => '',
        'post.type' => '',
        'post.status' => '',
        'post.featured' => '',
        'post.meta_title' => '',
        'post.meta_description' => '',
        'post.meta_schema' => '',
        'post.meta_data' => '',
        'image' => 'nullable|image|max:5120'
    ];

    protected $listeners = [
        'markdown-x:update' => 'updateBody'
    ];

    public function mount($id = null)
    {
        if (isset($id)) {
            $this->post = Post::where('id', $id)->where('user_id', auth()->user()->id)->firstOrFail();
        } else {
            $this->post = new Post;
        }
    }

    public function slugValidation($slug)
    {
        $slug = Str::slug($slug);
        $count = Post::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . time();
        }
        return $slug;
    }

    public function savePost()
    {
        $validator = Validator::make($this->getDataForValidation($this->rules), $this->rules);

        if ($validator->fails()) {
            $this->dispatchBrowserEvent('notification-show', [
                'type' => 'error',
                'message' => str_replace('post.', '', $validator->errors()->first())
            ]);
            return;
        }

        $this->post->user_id = auth()->user()->id;
        if (!isset($this->post->id)) {
            $this->post->slug = $this->slugValidation($this->post->title);
        }

        if ($this->image) {
            $this->post->image = $this->image->store('images', 'public');
            $this->image = null;
        }

        foreach ($this->post->toArray() as $column => $value) {
            if (is_null($value) && $column != 'image') {
                unset($this->post->{$column});
            }
        }

        $this->post->save();

        $this->dispatchBrowserEvent('set-url', [
            'url' => '/dashboard/posts/edit/' . $this->post->id
        ]);

        $this->dispatchBrowserEvent('notification-show', [
            'type' => 'success',
            'message' => 'Successfully saved your post.'
        ]);
    }

    public function updateBody($value)
    {
        $this->post->body = $value;
    }

    public function delete()
    {
        $this->post->delete();
        session()->flash(
            'notification',
            [
                'type' => 'success',
                'message' => 'Successfully Deleted Post'
            ]
        );
        return redirect('/dashboard');
    }

    public function removeTemporaryImage()
    {
        $this->image = null;
    }

    public function removeImage()
    {
        $this->post->image = null;
    }

    public function render()
    {
        $view = view('blog::livewire.posts-editor');

        $view->layout('layouts.marketing');

        return $view;
    }
}
