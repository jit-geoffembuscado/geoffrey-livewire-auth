<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;

class ProductCategoryController extends Component
{
    public $posts, $title, $product_category_id;
    public $updateMode = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function render()
    {
        $this->posts = ProductCategory::all();
        return view('livewire.product-category.product-category');
    }

    private function resetInputFields()
    {
        $this->title = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
        ]);

        ProductCategory::create($validatedDate);
        session()->flash('success', 'Post created successfully!');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = ProductCategory::findOrFail($id);
        $this->product_category_id = $id;
        $this->title = $post->title;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
        ]);

        $post = ProductCategory::find($this->product_category_id);
        $post->update([
            'title' => $this->title,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        ProductCategory::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}