<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ringtone;

class RingtoneController extends Controller
{


    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.ringtone.create', compact('categories'));
    }



    public function store(Request $request)
    {
        // dd($request->all());


        $ringtone = new Ringtone;
        $ringtone->category_id = $request->category_id;
        $ringtone->title = $request->title;

        // Generate slug
        $slug = str_replace(['/', ' ', '\\', ','], '-', strtolower($request->title));
        $slug = preg_replace('/-+/', '-', $slug);
        $ringtone->slug = $slug;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $filePath = 'storage/ringtone/' . $filename;
            $file->move(public_path('storage/ringtone'), $filePath);
            $ringtone->file = $filename;

            // Get file size and extension
            // $fileSize = $file->getSize(); // in bytes
            $fileExtension = $file->getClientOriginalExtension();

            // Assign file size and extension to the Ringtone model
            // $ringtone->size = $fileSize;
            $ringtone->format = $fileExtension;
        }

        $ringtone->status = $request->status; // Assuming 'status' is a column in the 'ringtones' table

        $ringtone->save();

        return redirect()->route('ringtone')->with('flash_success', 'Ringtone Inserted Successfully');

    }




    public function index()
    {
        $datas = Ringtone::latest()->get();
        return view('admin.ringtone.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = Ringtone::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.ringtone.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $ringtone = Ringtone::find($id);
        $ringtone->category_id = $request->category_id;
        $ringtone->title = $request->title;

        // Generate slug
        $slug = str_replace(['/', ' ', '\\', ','], '-', strtolower($request->title));
        $slug = preg_replace('/-+/', '-', $slug);
        $ringtone->slug = $slug;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = 'ringtone' . hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $filePath = 'storage/ringtone/' . $filename;
            $file->move(public_path('storage/ringtone'), $filePath);
            $ringtone->file = $filename;

            // Get file size and extension
            // $fileSize = $file->getSize(); // in bytes
            $fileExtension = $file->getClientOriginalExtension();

            // Assign file size and extension to the Ringtone model
            // $ringtone->size = $fileSize;
            $ringtone->format = $fileExtension;
        }

        $ringtone->status = $request->status; // Assuming 'status' is a column in the 'ringtones' table

        $ringtone->save();

        return redirect()->route('ringtone')->with('flash_success', 'Ringtone Inserted Successfully');

    }

    public function delete($id)
    {
        $ringtone = Ringtone::find($id);
        $ringtone->delete();
        return redirect()->back()->with('flash_success', "Ringtone Deleted successfully!");
    }

    public function inactive($id)
    {
        Ringtone::findOrFail($id)->update(['status' => 0]);
        // dd($data);

        return redirect()->back()->with('error', 'Ringtone Inacative Successfully');
    }

    public function active($id)
    {
        Ringtone::findOrFail($id)->update(['status' => 1]);
        // dd($data);
        return redirect()->back()->with('flash_success', 'Ringtone Acative Successfully');
    }
}