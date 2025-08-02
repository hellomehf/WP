<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;


class CategoryController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::withCount('products')->latest()->get();
    //     return view('categories.index', compact('categories'));
    // }

    public function create()
    {
        return view('pages.addcategory');
    }

    public function categorires(){
        $categories = Category::orderBy('id','asc')->paginate(10);
        return view('pages.category',compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $image=$request->file('image');
        $file_extension = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp.'.'.$file_extension;
        $this->GenerateCategoryThumbnailImage($image,$file_name);
        $category->image=$file_name;
        $category->save();

        return redirect()->route('pages.category')->with('status', 'Category added successfully!');
    }


    public function GenerateCategoryThumbnailImage($image , $imageName)
    {
        $destinationPath = public_path('uploads/category');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124,function($constraint){
            $constraint->aspectRation();
        })->save($destinationPath.'/'.$imageName);
    } 


    public function edit($id)
    {
        $category = Category::find($id);
        return view('pages.editcategory' , compact('category'));
    }

    public function update(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:categories,slug',
        'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        $category = Category::find($request->id);
        $category->name = $request->name;  
        $category->slug = Str::slug($request->name);
        if($request->hasFile('image')){
            if(File::exists(public_path('uploads/category').'/'.$category->image))
            {
                File::delete(public_path('uploads/category').'/'.$category->image);
            }
            $image=$request->file('image');
            $file_extension = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp.'.'.$file_extension;
            $this->GenerateCategoryThumbnailImage($image,$file_name);
            $category->image=$file_name;
        }
        $category->save();
        return redirect()->route('pages.category')->with('status' , 'Category has been update successfully!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (File::exists(public_path('uploads/category').'/'.$category->image))
        {
            File::delete(public_path('uploads/category').'/'.$category->image);
        }
        $category->delete();
        return redirect()->route('pages.category')->with('status','Category has been delete successfully!');
    }
}
