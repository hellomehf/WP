<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;



class ProductController extends Controller
{

    public function products()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(10);
        return view('pages.product',compact('products',));
    }

    public function product_add()
    {
        $categories = Category::select('id','name')->orderBy('name')->get();
        return view('pages.addproduct', compact('categories'));
    }

    public function product_store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:products,slug',
            'description'=> 'required',
            'regular_price'=> 'required',
            'sale_price'=> 'required',
            'expire_month'=> 'required',
            'stock_status'=> 'required',
            'featured'=> 'required',
            'quantity'=> 'required',
            'image'=> 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id'=> 'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->expire_month = $request->expire_month;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        $image=$request->file('image');
        $file_extension = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp.'.'.$file_extension;
        $this->GenerateProductThumbnailImage($image,$file_name);
        $product->image=$file_name;
        $product->category_id = $request->category_id;
        
        $product->save();
        return redirect()->route('pages.product')->with('status', 'Product added successfully!');
    }

    public function GenerateProductThumbnailImage($image , $imageName)
    {
        $destinationPath = public_path('uploads/products');
        $img = Image::read($image->path());
        $img->cover(540,689,"top");
        $img->resize(540,689,function($constraint){
            $constraint->aspectRation();
        })->save($destinationPath.'/'.$imageName);
    } 

    public function product_edit($id)
    {
        $product = Product::find($id);
        $categories = Category::select('id','name')->orderBy('name')->get();    
        return view('pages.editproduct', compact('product', 'categories'));
    }

    public function product_update(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:products,slug,'.$request->id,
            'description'=> 'required',
            'regular_price'=> 'required',
            'sale_price'=> 'required',
            'expire_month'=> 'required',
            'stock_status'=> 'required',
            'featured'=> 'required',
            'quantity'=> 'required',
            'image'=> 'mimes:png,jpg,jpeg|max:2048',
            'category_id'=> 'required'
        ]);

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->expire_month = $request->expire_month;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        if($request->hasFile('image')){
            if(File::exists(public_path('uploads/products').'/'.$product->image))
            {
                File::delete(public_path('uploads/products').'/'.$product->image);
            }
            $image=$request->file('image');
            $file_extension = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp.'.'.$file_extension;
            $this->GenerateProductThumbnailImage($image,$file_name);
            $product->image=$file_name;
        }
        
        $product->category_id = $request->category_id;
        
        $product->save();
        return redirect()->route('pages.product')->with('status', 'Product updated successfully!');
    }

    public function product_delete($id)
    {
        $product = Product::find($id);
        if (File::exists(public_path('uploads/products').'/'.$product->image))
        {
            File::delete(public_path('uploads/products').'/'.$product->image);
        }
        $product->delete();
        return redirect()->route('pages.product')->with('status', 'Product deleted successfully!');
    }
}
