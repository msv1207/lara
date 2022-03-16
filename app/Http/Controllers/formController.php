<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use ConvertApi\ConvertApi;
use Illuminate\Http\Request;

class formController extends Controller
{
    //
    private $url, $photo;


    private function svgGenerate()
    {
        ConvertApi::setApiSecret(env('API_KEY'));
        $result = ConvertApi::convert('svg', [
            'File' => $this->url,
        ], 'png'
        );
        $result->saveFiles(public_path('images'));
        return  exif_thumbnail( $this->photo);
    }

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
        $image=Photo::find($request->id);
        $this->url =public_path('images').'/'.$image->image;
        if(filetype($this->photo)=='png') {
            $this->photo = (imagecreatefrompng($this->url));
            imageline($this->photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagepng(($this->photo), $this->url);
        }else{
            $this->photo = (imagecreatefromjpeg($this->url));
            imageline($this->photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagejpeg(($this->photo), $this->url);
        }

        return redirect()->action($this->svgGenerate());
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
        $this->url =public_path('images').'/'.$image->image;
        if(filetype($this->photo)=='png') {
            $this->photo = (imagecreatefrompng($this->url));
            imagefilledrectangle($this->photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagepng(($this->photo), $this->url);
        }else{
            $this->photo = (imagecreatefromjpeg($this->url));
            imagefilledrectangle($this->photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagejpeg(($this->photo), $this->url);
        }

        return redirect()->action($this->svgGenerate());

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
        $this->url =public_path('images').'/'.$image->image;
        if(filetype($this->photo)=='png') {
            $this->photo = (imagecreatefrompng($this->url));
            imagearc($this->photo, $request->x1, $request->y1, $request->width,$request->height, 0, 360, $request->color);
            imagepng(($this->photo), $this->url);
        }else{
            $this->photo = (imagecreatefromjpeg($this->url));
            imagearc($this->photo, $request->x1, $request->y1, $request->width,$request->height, 0, 360, $request->color);
            imagejpeg(($this->photo), $this->url);
        }

        return redirect()->action($this->svgGenerate());

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
        $values = array(
            $request->x1,  $request->y1,
            $request->x2,  $request->y2,
            $request->x3,  $request->y3,
        );
        $image=Photo::find($request->id);
        $this->url =public_path('images').'/'.$image->image;
        if(filetype($this->photo)=='png') {
            $this->photo = (imagecreatefrompng($this->url));
            imagefilledpolygon($this->photo, $values, 3, $request->color);
            imagepng(($this->photo), $this->url);
        }else{
            $this->photo = (imagecreatefromjpeg($this->url));
            imagefilledpolygon($this->photo, $values, 3, $request->color);
            imagejpeg(($this->photo), $this->url);
        }

        return redirect()->action($this->svgGenerate());

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
        $this->url =public_path('images').'/'.$image->image;
        if(filetype($this->photo)=='png') {
            $this->photo = (imagecreatefrompng($this->url));
            imagestring($this->photo, $request->font, $request->x1, $request->y1,$request->text, $request->color);
            imagepng(($this->photo), $this->url);
        }else{
            $this->photo = (imagecreatefromjpeg($this->url));
            imagestring($this->photo, $request->font, $request->x1, $request->y1,$request->text, $request->color);
            imagejpeg(($this->photo), $this->url);
        }

        return redirect()->action($this->svgGenerate());


    }



}
