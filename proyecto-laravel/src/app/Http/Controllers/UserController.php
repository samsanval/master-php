<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function config()
    {
        return view ('user.config');
    }
    public function update(Request $request)
    {
        $user = \Auth::user();
        $id = $user->id;
        $validate = $this->validate($request, array(
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ));

        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;
        //Imagen
        $image_path = $request->file('file');
        if($image_path)
        {
            $imagePathName = time().$image_path->getClientOriginalName();
            Storage::disk('users')->put($imagePathName,File::get($image_path));
            $user->image = $imagePathName;
        }

        $user->update();
        return redirect()->route('config');

    }
    public function getImage($fileName)
    {
        $file = Storage::disk('users')->get($fileName);
        return new Response($file,200);
    }
}
