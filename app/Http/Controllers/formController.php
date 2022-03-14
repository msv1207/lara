<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class formController extends Controller
{
    //
    public function line(Request $request)
    {
        $request->validate([
            'x1' => 'required',
            'y1' => 'required',
            'x2' => 'required',
            'y2' => 'required',
            'color' => 'required',
        ]);
        $image=Photo::find(33);
        $photo =public_path('images').'/'.$image->image;
        $photo=(imagecreatefrompng("$photo"));
        imageline ($photo, $request->x1, $request->x2, $request->y1, $request->y2, $request->color);
        header("Content-type: image/png");

        return( base64_decode(imagepng($photo))->move(public_path('images'),"$image->image"));
    }

    public function rectangle(Request $request)
    {
        $request->validate([
            'x1' => 'required',
            'y1' => 'required',
            'x2' => 'required',
            'y2' => 'required',
            'color' => 'required',
        ]);
        $image=Photo::find(33);
        $photo =public_path('images').'/'.$image->image;
        $photo=(imagecreatefrompng("$photo"));
//        $request->toArray();
        imagerectangle($photo, $request->x1, $request->x2, $request->y1, $request->y2, $request->color);

        header("Content-type: image/png");

        return( base64_decode(imagepng($photo))->move(public_path('images'),"$image->image"));

    }
    public function arc(Request $request)
    {
        $request->validate([
            'x1' => 'required',
            'y1' => 'required',
            'width' => 'required',
            'height' => 'required',
            'color' => 'required',
        ]);
        $image=Photo::find(33);
        $photo =public_path('images').'/'.$image->image;
        $photo=(imagecreatefrompng("$photo"));
//        $request->toArray();
//        imagearc($photo, $x1,$y1,$width,$height, 0, 360, $color);

        imagearc($photo, $request->x1, $request->y1, $request->width,$request->height, 0, 360, $request->color);

        header("Content-type: image/png");

        return( base64_decode(imagepng($photo))->move(public_path('images'),"$image->image"));

    }
    public function triangle(Request $request)
    {
        $request->validate([
            'x1' => 'required',
            'y1' => 'required',
            'x2' => 'required',
            'y2' => 'required',
            'x3' => 'required',
            'y3' => 'required',
            'color' => 'required',
        ]);
        $image=Photo::find(33);
        $photo =public_path('images').'/'.$image->image;
        $photo=(imagecreatefrompng("$photo"));
//        $request->toArray();
        $values = array(
            $request->x1,  $request->y1,
            $request->x2,  $request->y2,
            $request->x3,  $request->y3,
        );
        imagefilledpolygon($photo, $values, 3, $request->color);

        header("Content-type: image/png");

        return( base64_decode(imagepng($photo))->move(public_path('images'),"$image->image"));

    }
    public function text(Request $request)
    {
        $request->validate([
            'x1' => 'required',
            'y1' => 'required',
            'font' => 'required',
            'text' => 'required',
            'color' => 'required',
        ]);
        $image=Photo::find(33);
        $photo =public_path('images').'/'.$image->image;
        $photo=(imagecreatefrompng("$photo"));
//        $request->toArray();
        imagestring($photo, $request->font, $request->x1, $request->y1,$request->text, $request->color);

        header("Content-type: image/png");

        return( base64_decode(imagepng($photo))->move(public_path('images'),"$image->image"));

    }



}
