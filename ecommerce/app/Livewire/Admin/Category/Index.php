<?php

namespace App\Livewire\Admin\Category;
use App\Models\category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $categories = category::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.category.index',['categories' => $categories]);
    }

}
