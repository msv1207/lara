<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use ConvertApi\ConvertApi;
use Illuminate\Http\Request;

class formController extends Controller
{
    //
    public function line(Request $request)
    {

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
        $url=$im;
        $photo=(imagecreatefrompng("$im"));
        imageline ($photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
        base64_decode(imagepng( ($photo), $im));
        header("Content-type: image/png");
        ConvertApi::setApiSecret(env('API_KEY'));
        $result = ConvertApi::convert('svg', [
            'File' => $url,
        ], 'png'
        );
        $result->saveFiles(public_path('images'));
//        $url = 'http://server.com/image.png';
//        $data = json_decode(file_get_contents("http://api.rest7.com/v1/raster_to_vector.php?file=C:\fakepath\depositphotos_2983099-stock-illustration-grunge-design.png&format=svg&api_key=903796c2b0aa417dc725eab8d588e3e7a09a8cc2"));
//
//        if (@$data->success !== 1)
//        {
//            die('Failed');
//        }
//        $vec = file_get_contents($data->file);
//        file_put_contents($url , $vec);
//        return $result;
//        return  exif_thumbnail(imagepng($photo));
       return json_encode("Sucsess");
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
