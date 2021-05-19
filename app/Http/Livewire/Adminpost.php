<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\Post;
use Livewire\WithFileUploads;

class Adminpost extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $title;
    public $category;
    public $image;
    public $like;
    public $body;
    public $editMode = false;
    public $showModal = false;
    public $search = '';
    public $postId;
    public $newImage;

    public function render()
    {
        $posts = Auth::user()->posts()->latest()->paginate(5);
        return view('livewire.adminpost', compact('posts'));

        // $listings = Auth::user()->listings()->where('name', 'like', "%{$this->search}%")->paginate(2);
    }

    public function showCreateModal()
    {
        $this->showModal = true;
    }

    public function createList()
    {
        $this->validate([
            'title' => 'required|unique:posts',
            'category' => 'required',
            'image' => 'required|image|max:1024|mimes:png,jpg',
            'body' => 'required|max:255'
        ]);

        $imageName = $this->image->getClientOriginalName();
        $this->image->storeAs('public/images', $imageName);
        Post::create([
            'title' => $this->title,
            'category' => $this->category,
            'body' => $this->body,
            'user_id' => Auth::user()->id,
            'image' => $imageName
        ]);

        $this->reset();
        session()->flash('flash.banner', 'Post Created');
    }

    public function showEditModal($id)
    {

        $this->reset();
        $this->postId = $id;
        $this->editMode = true;
        $this->showModal = true;

        $post = Post::findOrFail($this->postId);

        $this->title = $post->title;
        $this->category = $post->category;
        $this->newImage = $post->image;
        $this->body = $post->body;
    }

    public function updatedShowModal()
    {
        $this->reset();
    }


    public function updatePost()
    {
        $this->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'max:1024|mimes:png,jpg|nullable',
            'body' => 'required|max:255'
        ]);

        if ($this->image) {
            unlink('public/images/' . $this->newImage);
            $this->newImage = $this->image->getClientOriginalName();
            $this->store('public/images', $this->newImage);
        }

        $post = Post::findOrFail($this->postId);
        $post->update([
            'title' => $this->title,
            'category' => $this->category,
            'body' => $this->body,
            'image' => $this->newImage
        ]);

        $this->reset();
        session()->flash('flash.banner', 'Post Updated');
    }

    public function deletePost($id)
    {

        $post = Post::findOrFail($id);
        unlink('storage/images/' . $post->image);
        $post->delete();

        session()->flash('flash.banner', 'Post deleted Successfully');
        $this->reset();
        return back();
    }
}
