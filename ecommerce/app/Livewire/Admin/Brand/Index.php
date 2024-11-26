<?php

namespace App\Livewire\Admin\Brand;
use App\Model\Brand;
use Illuminate\Support\Str;



use Livewire\Component;

class Index extends Component
{
    public $name, $slug, $status;
    public function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];

    }

    function storeBrand(){
        $validateData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => str::slug($this->slug),
            'status' => $this->status ==true ? '1':'0',
        ]);
        session()->flash('message', 'Brand added successfully');
        $this->dispatchBrowserEvent('close-modal');

    }

   
    public function render()
    {
        return view('livewire.admin.brand.index')->extends('layouts.inc.app')
        ->section('content');
    }
}
