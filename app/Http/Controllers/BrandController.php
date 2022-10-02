<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
//use Intervention\Image\Image;
//use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Image as Img;
//use Intervention\Image\Facades\Image;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(){
        $brands = Brand::orderBy('updated_at','desc')->paginate(5);
//        dd($brands->all());
        return view('admin.brand.index' , compact('brands'));
    }

    public function store(Request $request)
    {
        $brand = new Brand();

        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:5|max:255',
            'brand_image' => 'required|image|max:size:1000|mimes:jpeg,jpg,png,bmp,gif,svg',
        ],
        [
            'brand_name.required' =>'Name Mandatory with at least 5 characters',
            'brand_image.required' => 'Minimum image size is 10MB and Mandatory',
        ]);

        $brand->brand_name = $request->brand_name;
        if($request->hasFile('brand_image'))
        {
            $file= $request->file('brand_image');
            $file_extension = $file->getClientOriginalExtension();
            $img_name = time() . '.' . $file_extension;
//            $file->move('images/brand_images/' , $img_name);
//            Here using the image intervention package for resizing the image,that's why upper line is commented out.
            Image::make(file_get_contents($file))->resize('250','200')->save('images/brand_images/'.$img_name);
            $brand->brand_image =$img_name;
        }

        $brand->save();
        return redirect()->route('all_brands')->with(['success' => 'Brand Created Successfully']);

    }

    public function edit($id){
        $editbrand = Brand::find($id);
        return view('admin.brand.edit' , compact('editbrand'));
    }

    public function update(Request $request ,$id){

        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;

        if($request->hasFile('brand_image'))
        {
            $old_image_destination = 'images/brand_images/'.$brand->brand_image;
            if (File::exists($old_image_destination))
            {
                File::delete($old_image_destination);
            }

            $file= $request->file('brand_image');
            $file_extension = $file->getClientOriginalExtension();
            $img_name = time() . '.' . $file_extension;
//            $file->move('images/brand_images/' , $img_name);

//            Here using the image intervention package for resizing the image,that's why upper line is commented out.
            Image::make(file_get_contents($file))->resize('200','250')->save('images/brand_images/'.$img_name);

            $brand->brand_image =$img_name;
            }
        $brand->update();
        return redirect()->route('all_brands')->with(['success' => 'Brand Updated Successfully']);
    }

    public function delete($id){
        $brand=Brand::find($id);
        $old_image_destination = 'images/brand_images/'.$brand->brand_image;
        if (File::exists($old_image_destination))
        {
            File::delete($old_image_destination);
        }
        $brand->delete();
        return redirect()->route('all_brands')->with(['success' => 'Brand Deleted Successfully']);
    }
}
