<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;
use App\Models\Ringtone;
use App\Models\Category;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginPost(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('email', 'password');
        $credentials['password'] = $request->password;
        // dd($credentials);
        if (Auth::guard('admin')->attempt($credentials)) {
            // dd('hi');
            return redirect()->route('admin-dashboard')->with('flash_success', 'Login Successful');
        } else {
            return back()->with('error', 'Invalid Credentials');
        }
    }
    public function dashboard()
    {
        $category_count = Category::count();
        $ringtone_count = Ringtone::where('status', 1)->count();
        return view('admin.index', compact('category_count', 'ringtone_count'));
    }

    public function adminLogout()
    {
        Auth::logout();

        return redirect()->route('admin-login')->with('flash_success', 'Admin Logout Successfully');
    }

    public function adminProfile()
    {
        $admin = Auth::user();
        // dd($admin);
        return view('admin.profile', compact('admin'));
    }

    public function adminProfileUpdate(Request $request)
    {
        // dd($request->all());

        $admin = Auth::user();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;



        if ($request->file('image')) {
            $image = $request->file('image');
            @unlink(public_path('storage/admin/' . $admin->image));
            $filename = 'admin' . time() . '.' . $image->getClientOriginalExtension();

            // installing image intervention
            // composer require intervention/image

            // config/app.php
            // Intervention\Image\ImageServiceProvider::class,
            // 'Image' => Intervention\Image\Facades\Image::class,

            // php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent"


            Image::make($image)->resize(256, 256)->save('storage/admin/' . $filename);
            $filePath = 'storage/admin/' . $filename;
            $admin->image = $filename;
        }
        $admin->save();



        return redirect()->back()->with('flash_success', 'Admin Profile Updated Successfully');

    }



    public function updatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $admin = Auth::user();
            $admin->password = bcrypt($request->new_password);
            $admin->save();


            return redirect()->route('admin-login')->with('flash_success', 'Password Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Old password is not match');
        }

    }
}
