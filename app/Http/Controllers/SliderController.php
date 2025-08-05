<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;  
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    public function index(){  
        $sliders = Slider::all();  
        return view('backend.content.slider.index', compact('sliders'));
    }

    public function create(){
        return view('backend.content.slider.create');
    }
    
    public function store(Request $request){    
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $slider = new Slider();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('sliders', $imageName, 'public');
            $slider->image = 'sliders/'.$imageName;
        }
        
        $slider->save();
        
        return redirect()->route('slider')->with('success', 'Slider created successfully.');
    }
    
    public function edit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.content.slider.edit', compact('slider'));
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $slider = Slider::findOrFail($id);
        
        if ($request->hasFile('image')) {
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('sliders', $imageName, 'public');
            $slider->image = 'sliders/'.$imageName;
        }
         
        if (!$request->hasFile('image')) {
            $slider->image = $slider->image;  
        }
         
        
        $slider->save();
        
        return redirect()->route('slider')->with('success', 'Slider updated successfully.');
    }
    
    public function destroy($id){
        $slider = Slider::findOrFail($id);
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();
        return redirect()->route('slider')->with('success', 'Slider deleted successfully.');
    }
}

?>