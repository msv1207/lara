<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadImageController extends Controller
{
    /**
     * Show the application imageUpload.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        dd((new \App\Models\Photo)->load('images'));
//        $photo='<img src="';
//        dd($photo);
//        dd($photo);
        $image=Photo::find(30);
        $photo =public_path('images').'/'.$image->image;

//        dd( $photo);
//        dd(Photo::find(1)->image);
//        $photo .='/';
//        $photo .=Photo::find(1)->image;
//        $photo .='">';
        header("Content-type: image/png");
//        return base64_decode( imagepng(imagecreatefrompng($photo)));

        $photo=(imagecreatefrompng("$photo"));
        $values = array(
            40,  50,  // Point 1 (x, y)
            20,  240, // Point 2 (x, y)
            60,  60,  // Point 3 (x, y)
        );
//        $image->update( imageline($photo, 4, 3, 800, 800, 000000));
        imagestring($photo, 46, 80, 80,'60gfg', 435435);
        imageline ($photo, 80,60,240,180, 435435);
        imagerectangle($photo, 80,60,240,180, 435435);
        imagearc($photo, 80,60,240,180, 0, 360, 435435);
        imagefilledpolygon($photo, $values,3,435435);
//        $image->update("")
//        dd(imagepng($photo));
//        $photo->move(public_path('images'), $photo);
        return( base64_decode(imagepng($photo)));

//dd($photo);
//        dd(public_path('images').$photo);
//        $file = Photo::get($photo);
//        $type = Photo::mimeType($photo);
//
//        $response = Response::make($file, 200);
//        $response->header("Content-Type", $type);
//
//        echo( imagecreatefromjpeg("$photo"));
//        return  $photo;
//(Photo::all('image'));
    }

    public function rectangle(Request $request)
    {
        $photo=$request->image;
        header("Content-type: image/png");
        imagerectangle($photo, 80,60,240,180, 435435);
        return $photo;
    }


    public function imageUpload()
    {
//        dd(Photo::all());
        return view('imageUpload');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

            $input = $request->all();
//            dd($request);
            $input['image'] = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $input['image']);
            Photo::create($input);

//            $request->dump();
//            return Response($request->image);
//        return redirect('show');
        return Response()->json(["success"=>"Image Upload Successfully"]);

    }

}
