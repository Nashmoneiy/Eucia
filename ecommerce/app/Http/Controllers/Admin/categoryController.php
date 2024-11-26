<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    function index() {
        return view('admin.category.category');
    }
    
    function store(CategoryFormRequest $request){
        $validatedData = $request->validated();

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        
        $uploadpath = 'uploads/category/';
        if ($request->hasFile('image')) {
            
           $fileName = time().$request->file('image')->getClientOriginalName();
           $request->file('image')->move(public_path('uploads/category'), $fileName);
           $validatedData['image'] =  $uploadpath.$fileName;

        }
        $category->image = $validatedData['image'];

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        $category->save();
       
 return  redirect('admin/category')->with('status', 'category added succesfully');
    }
    function index2(){
        return view('admin/category/index');
    }
    function edit(Category $category){
        return view('admin.category.edit', compact('category'));

    }
    function update(CategoryFormRequest $request, $category){
        $validatedData = $request->validated();

        $category = Category::findOrFail($category);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        $uploadpath = 'uploads/category/';
        if ($request->hasFile('image')) {
           
            $path = 'admin/uploads/category/'.$category->image;
            if (file::exists($path)) {
                file::delete($path);
            }
           $fileName = time().$request->file('image')->getClientOriginalName();
           $request->file('image')->move(public_path('uploads/category'), $fileName);
           $validatedData['image'] = $uploadpath.$fileName;
        }

        
        $category->image = $validatedData['image']?? $category->image;
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        $category->update();
        return  redirect('admin/category')->with('status', 'category updated succesfully');
    }

    public function destroy($category){
        $category = Category::find($category);
        if ($category) {
            $path = 'admin/uploads/category/'.$category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
            $category->delete();
            return redirect('admin/view')->with('message','category deleted successfully');
        }else {
            return redirect('admin/category')->with('message','not deleted');
        }

    }
}
