<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function blog()
    {
        return view('backend.blog.list');
    }

    public function add_blog()
    {
        //CategoryModel এর ভিতর এই function ঃ getCategory() বানাতে হবে যেন ক্যাটেগরি ডাটা প্রাপ্ত করা 
        $data['getCategory'] = CategoryModel::getCategory();

      // ভিউতে ডাটা প্রেরণ করা হয়েছে

        return view('backend.blog.add' , $data);
    }

    public function insert_blog(Request $request)
    {
        $save = new BlogModel;
        $save->user_id      = Auth::user()->id;
        $save->title        = trim($request->title);
        $save->category_id  = trim($request->category_id);
        $save->image_file   = trim($request->image_file);
        $save->description  = trim($request->description);
        $save->meta_keywords          = trim($request->meta_keywords);
        $save->is_publish   = trim($request->is_publish);
        $save->status       = trim($request->status);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = BlogModel::where('slug', '=' , $slug);
        if(!empty($checkSlug))
        {
            $dbslug = $slug.'-'.$save->id;

        }else{
            $dbslug = $slug;
        }

        $save->slug = $dbslug;

        if ($request->file('image_file')) {
            $file = $request->file('image_file'); // ফাইল অবজেক্ট পাওয়া
            $ext = $file->getClientOriginalExtension(); // ফাইল এক্সটেনশন পাওয়া
            $filename = $dbslug . '.' . $ext; // ফাইলের নাম নির্ধারণ করা
            $file->move('upload/blog' , $filename); // ফাইল মুভ করা
            $save->image_file = $filename; // ডাটাবেসে ফাইলের নাম সংরক্ষণ করা
        } 
        
        $save->save();

        return redirect('panel/blog/list')->with('success', 'Blog Inserted Successfully');
    }
}
