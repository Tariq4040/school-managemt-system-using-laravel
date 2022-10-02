<?php

namespace App\Http\Controllers;

use App\Models\MultiPicture;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MultiPictureController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(){
        $multiple_images = MultiPicture::all();
        return view('admin.multipictures.index' ,compact('multiple_images'));
    }

    public function store(Request $request){

//        $validated = $request->validate([
//            'image' => 'required|image|max:size:1000|mimes:jpeg,jpg,png,bmp,gif,svg',
//        ],
//            [
//                'image.required' => 'Minimum image size is 10MB and Mandatory',
//            ]);

        if($request->hasFile('image'))
        {
            $file= $request->file('image');
            foreach ($file as $multi_image)
            {
                $file_extension = $multi_image->getClientOriginalExtension();
                $img_name = hexdec(uniqid()) . '.' . $file_extension;
//            $file->move('images/multi_images/' , $img_name); //first to move images into folder and below is the 2nd

//            Here using the image intervention package for resizing the image,that's why upper line is commented out.
                Image::make(file_get_contents($multi_image))->resize('300','300')->save('images/multi_images/'.$img_name);
                MultiPicture::insert([
                    'image' => $img_name,
                ]);
            }

        }

        return redirect()->back()->with(['success' => 'Multi Images Created Successfully']);
    }
}
