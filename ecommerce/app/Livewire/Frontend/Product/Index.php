<?php

namespace App\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
class Index extends Component
{
    public $products, $category, $brandInputs = [];

    protected $queryString = ['brandInputs'];

    function mount($category){

    
        $this->category = $category;

    }
    
    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
               ->when($this->brandInputs, function($q){
                $q->whereIn('brand', $this->brandInputs);
               })
               ->where('status','1')
               ->get();
               
 
        return view('livewire.frontend.product.index',[
            'products' => $this->products,
            'category' => $this->category
        ]);
    }

    


    
}
