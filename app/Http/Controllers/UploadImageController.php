<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application imageUpload.
     *
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        $id=Auth::id();
        $image = Photo::all()->where('user_id', '=', $id);
        $output = '';
        foreach ($image as $value) {
            $im = asset('images') . '/' . $value->image;
            $output .= "<img src=$im> <br>";
            $output .= $value->id . ' ' . $value->updated_at . '<br>'  . $value->users->name;
        }

        return $output;
    }

    /**
     * Show the application imageUploadPost.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png|max:2048',
        ]);

        $input = $request->all();
        $input['image'] = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $input['image']);
//        Photo::create($input);
        $id = Auth::user()->id;
        Photo::create([
            'image' => $input['image'],
            'user_id'=> $id
        ]);

        return Response()->json(['success'=>'Image Upload Successfully']);
    }
}
