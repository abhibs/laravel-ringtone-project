<?php

namespace App\Http\Controllers;

use App\Models\Ringtone;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $ringtones = Ringtone::where('status', 1)->orderBy('id', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('welcome', compact('categories', 'ringtones'));
    }

    public function ringtoneDetails($id, $slug)
    {
        $ringtone = Ringtone::where('slug', $slug)->first();
        return view('ringtone-details', compact('ringtone'));
    }

    public function downloadRingtone($id)
    {
        $ringtone = Ringtone::find($id);
        $ringtonePath = $ringtone->file;
        $filePath = public_path('storage/ringtone/') . $ringtonePath;
        $ringtone->increment('download');
        $ringtone->save();
        return \Response::download($filePath);
    }


}