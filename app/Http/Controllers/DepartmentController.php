<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('backend/content/department/index',compact('departments'));
    }

    public function create(){ 
        return view('backend/content/department/create');
    }

    public function store(Request $request){
         
       $validation = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new department instance
        $department = new Department();
        $department->name = $request->name;
        $department->title = $request->title;
        $department->description = $request->description;
 
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('departments', 'public');
            $department->image = $imagePath;
        }

        // Save the department
        $department->save();

        return redirect()->route('department')->with('success', 'Department created successfully!');
    }

    // Additional methods for edit, update, and delete can be added here
    public function edit($id){
        $department = Department::findOrFail($id);
        return view('backend/content/department/edit', compact('department'));
    }

    public function update(Request $request, $id){
        $department = Department::findOrFail($id); 

         $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $department->name = $request->name;
        $department->title = $request->title;
        $department->description = $request->description;

        if ($request->hasFile('image')) { 
        if ($department->image && Storage::disk('public')->exists($department->image)) {
            Storage::disk('public')->delete($department->image);
        }
 
        $imagePath = $request->file('image')->store('departments', 'public');
        $department->image = $imagePath;
     }

        $department->save();

        return redirect()->route('department')->with('success', 'Department updated successfully!');
    }
    
    public function destroy($id){
        $department = Department::findOrFail($id);

        if ($department->image && Storage::disk('public')->exists($department->image)) {
            Storage::disk('public')->delete($department->image);
        }

        $department->delete();

        return redirect()->route('department')->with('success', 'Department deleted successfully!');
    }

}
