<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);

        Category::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);


        return redirect()->route('category')->with('flash_success', 'Category Inserted Successfully');

    }

    public function index()
    {
        $datas = Category::latest()->get();
        return view('admin.category.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.category.edit', compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',

        ]);
        $id = $request->id;
        Category::findOrFail($id)->update([
            'name' => $request->name,
        ]);


        return redirect()->route('category')->with('flash_success', 'Category Updated Successfully');

    }




    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('flash_success', 'Category Deleted Successfully');

    }
}
