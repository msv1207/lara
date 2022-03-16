<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    /**
     * Show the application imageUpload.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image=Photo::all();
        $output='';
        foreach ($image as $value) {
            $im =asset('images') . '/' . $value->image;
            $output.= "<img src=$im> <br>";
            $output.= $value->id ." ". $value->updated_at . '<br>';
        }
        return $output;
    }


    /**
     * Show the application imageUploadPost.
     *
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function imageUploadPost(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png|max:2048'
        ]);

            $input = $request->all();
            $input['image'] = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $input['image']);
            Photo::create($input);
            return Response()->json(["success"=>"Image Upload Successfully"]);

    }

}
