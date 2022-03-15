<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class formController extends Controller
{
    //
    public function line(Request $request)
    {
        var_dump($request->all());

        $request->validate([
            'id' => 'required',
            'x1' => 'required',
            'y1' => 'required',
            'x2' => 'required',
            'y2' => 'required',
            'color' => 'required',
        ]);
//        var_dump($request);
        $image=Photo::find($request->id);
        $im =public_path('images').'/'.$image->image;
        $photo=(imagecreatefrompng("$im"));
        imageline ($photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
        imagepng($photo, $im);
        header("Content-type: image/png");
        echo (imagepng($photo));
        return (imagepng($photo));
        return "images/". Photo::find($request->id)->image;
    }

    public function rectangle(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'x1' => 'required',
            'y1' => 'required',
            'x2' => 'required',
            'y2' => 'required',
            'color' => 'required',
        ]);
        $image=Photo::find($request->id);
        $im =public_path('images').'/'.$image->image;
        $photo=(imagecreatefrompng($im));
        imagerectangle($photo, $request->x1, $request->x2, $request->y1, $request->y2, $request->color);
        imagepng($photo, $im);
        header("Content-type: image/png");
        return base64_decode(imagepng($photo));

    }
    public function arc(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'x1' => 'required',
            'y1' => 'required',
            'width' => 'required',
            'height' => 'required',
            'color' => 'required',
        ]);
        $image=Photo::find($request->id);
        $im =public_path('images').'/'.$image->image;
        $photo=(imagecreatefrompng("$im"));
//        $request->toArray();
//        imagearc($photo, $x1,$y1,$width,$height, 0, 360, $color);

        imagearc($photo, $request->x1, $request->y1, $request->width,$request->height, 0, 360, $request->color);
        imagepng($photo, $im);

        header("Content-type: image/png");

        return base64_decode(imagepng($photo));

    }
    public function triangle(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'x1' => 'required',
            'y1' => 'required',
            'x2' => 'required',
            'y2' => 'required',
            'x3' => 'required',
            'y3' => 'required',
            'color' => 'required',
        ]);
        $image=Photo::find($request->id);
        $im =public_path('images').'/'.$image->image;
        $photo=(imagecreatefrompng("$im"));
//        $request->toArray();
        $values = array(
            $request->x1,  $request->y1,
            $request->x2,  $request->y2,
            $request->x3,  $request->y3,
        );
        imagefilledpolygon($photo, $values, 3, $request->color);
        imagepng($photo, $im);

        header("Content-type: image/png");

        return base64_decode(imagepng($photo));

    }
    public function text(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'x1' => 'required',
            'y1' => 'required',
            'font' => 'required',
            'text' => 'required',
            'color' => 'required',
        ]);
        $image=Photo::find($request->id);
        $im =public_path('images').'/'.$image->image;
        $photo=(imagecreatefrompng("$im"));
//        $request->toArray();
        imagestring($photo, $request->font, $request->x1, $request->y1,$request->text, $request->color);
        imagepng($photo, $im);

        header("Content-type: image/png");

        return base64_decode(imagepng($photo));

    }



}
