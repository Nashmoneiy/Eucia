<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\File;


class productController extends Controller
{
    function index() {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }
    function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return  view('admin/product/create', compact('categories', 'brands'));
    }

    function index2(){
        $products = Product::all();
        return  view('admin.product.index',compact('products') );
    }

    function store(ProductFormRequest $request) {
        $validatedData = $request->validated();
        $category = Category::findOrFail ($validatedData['category_id']);
        
        
        $product = $category->products()->create([
            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand'=>$validatedData['brand'],
            'small_description'=>$validatedData['small_description'],
            'description'=>$validatedData['description'],
            'original_price'=>$validatedData['original_price'],
            'selling_price'=>$validatedData['selling_price'],
            'quantity'=>$validatedData['quantity'],
            'trending'=>$request->trending == true ? '1':'0',
            'status'=>$request->status == true ? '1':'0',
            'meta_title'=>$validatedData['meta_title'],
            'meta_keyword'=>$validatedData['meta_keyword'],
            'meta_description'=>$validatedData['meta_description'],
            
        ]);
        

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/category/';
               $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        return redirect('admin/product/index')->with('message','product added successfully');
       

    }
    function edit(int $product_id){
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);
        return view('admin.product.edit', compact('categories', 'brands', 'product'));
    }

    function update(ProductFormRequest $request, int $product_id) {
        $validatedData = $request->validated();

        $product = Product::where('id',$product_id)->first();
        if ($product) {
            $product->update([
                'category_id'=>$validatedData['category_id'],
                'name'=>$validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand'=>$validatedData['brand'],
                'small_description'=>$validatedData['small_description'],
                'description'=>$validatedData['description'],
                'original_price'=>$validatedData['original_price'],
                'selling_price'=>$validatedData['selling_price'],
                'quantity'=>$validatedData['quantity'],
                'trending'=>$request->trending == true ? '1':'0',
                'status'=>$request->status == true ? '1':'0',
                'meta_title'=>$validatedData['meta_title'],
                'meta_keyword'=>$validatedData['meta_keyword'],
                'meta_description'=>$validatedData['meta_description'],
                
            ]);
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/category/';
                   $i = 1;
                foreach($request->file('image') as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;
    
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            return redirect('admin/product/index')->with('message','product updated successfully');
           

        }else {
            return redirect('admin/product')->with('message', 'no such product id found');
        }

    }

    function destroyImage(int $product_image_id) {
        $productImage = ProductImage::find($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'product image deleted');
        


    }

   
        function destroy(Request $request){
            $product_id = $request->input('delete_id');
            $product = Product::find($product_id);
            if ($product->productImages()) {
                foreach($product->productImages() as $image)
                if(File::exists($image->image))
                   File::delete($image->image);
            }
            $product->delete();
    
            return  redirect('admin/product')->with('message', 'product deleted succesfully');
    
        }
    
}
