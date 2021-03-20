<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('image.create');
    }

    public function save(Request $request)
    {
        $validate = $this->validate($request, array(
            'description' => 'required',
            'image-path' => 'required | image ',
        ));
        $user= \Auth::user();
        $imagePath = $request->file('image-path');
        $description =  $request->input('description');
        $image = new Image();
        $image->user_id = $user->id;
        $image->description = $description;

        if($imagePath)
        {
            $imagePathName = time().$imagePath->getClientOriginalName();
            Storage::disk('images')->put($imagePathName, File::get($imagePath));
            $image->image_path = $imagePathName;
        }
        $image->save();
        return redirect()->route('home')->with(array(
            'message' => 'La foto ha sido subida correctamente',
        ));
    }

    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id)
    {
        $image = Image::find($id);
        return view('image.detail', array(
            'image' => $image,
        ));
    }
}
