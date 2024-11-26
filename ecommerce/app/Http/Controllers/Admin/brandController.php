<?php


namespace App\Http\Controllers\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Requests\BrandFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;



class brandController extends Controller
{
    
    function index() {
        
        $brands = Brand::all();
        
        $categories = Category::where('status','1')->get();
        return view('admin.brand.index', compact('brands','categories'));
    }

    function store(BrandFormRequest $request){
        
        $validatedData = $request->validated();

        $brand = new Brand;
        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);
        $brand->status = $request->status == true ? '1':'0';
        $brand->category_id = $validatedData['category_id'];
        $brand->save();
        return  redirect('admin/brand')->with('status', 'brand added succesfully');
        
        
        
    }

    function edit($brand){
        //$product = Product::findOrFail($product_id);
        $brand = Brand::find($brand);
        
        return response()->json([
            'status' => $brand->status == true ? '1':'0',
            'brand' => $brand,
            
            
        ]);
    }

    function update(Request $request){
        $brand_id = $request->input('brand_id');
        
        $brand = Brand::find($brand_id);
        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');
        $brand->status = $request->status == true ? '1':'0';  
        $brand->category_id = $request->input('category_id');
    
        $brand->update();
        return  redirect('admin/brand')->with('status', 'Brand updated succesfully');
        
    }

    function destroy(Request $request){
        $brand_id = $request->input('delete_id');
        $brand = Brand::find($brand_id);
        $brand->delete();

        return  redirect('admin/brand')->with('status', 'Brand deleted succesfully');

    }
    
}
