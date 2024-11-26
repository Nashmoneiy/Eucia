<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\SliderFormRequest;
use Illuminate\Support\Facades\File;

class sliderController extends Controller
{
    function index(){
        $sliders = Slider::all();
        return view('admin.sliders.index',compact('sliders'));
    }

    function create(){
        $sliders = Slider::all();
        return view('admin.sliders.create', compact('sliders'));
    }

    function store(SliderFormRequest $request){
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('uploads/category/', $filename);
            $validatedData['image'] = "uploads/category/$filename";
        }

        
        $validatedData['status'] = $request->status == true ? '1':'0';

        Slider::create([
            'title' =>  $validatedData['title'],
            'description' =>  $validatedData['description'],
            'image' =>  $validatedData['image'],
            'status' =>  $validatedData['status'],

        ]);
        return redirect('admin/sliders')->with('message', 'slider added succesfully');

    }

    function edit(Slider $slider) {
        return view('admin.sliders.edit', compact('slider'));

    }

    function update(SliderFormRequest $request, Slider $slider){
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $path = 'admin/uploads/category/'.$slider->image;
            $path = $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }


            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('uploads/category/', $filename);
            $validatedData['image'] = "uploads/category/$filename";
        }

        
        $validatedData['status'] = $request->status == true ? '1':'0';

        Slider::where('id',$slider->id)->update([
            'title' =>  $validatedData['title'],
            'description' =>  $validatedData['description'],
            'image' =>  $validatedData['image'] ?? $slider->image,
            'status' =>  $validatedData['status'],

        ]);
        return redirect('admin/sliders')->with('message', 'slider updated succesfully');
    }


    function destroy(Request $request){
        $slider_id = $request->input('delete_id');
        $slider = Slider::find($slider_id);
        
        if ($slider ->count() > 1) {
            $path = 'admin/uploads/category/'.$slider->image;

            if(File::exists($path)){
               File::delete($path);
        }
        $slider->delete();

        return  redirect('admin/sliders')->with('message', 'product deleted succesfully');

    }
    return redirect('admin/sliders')->with('status', 'something went wrong!');
}
}
