<?php

namespace App\Http\Controllers;

use Line;
use Text;
use Triangle;
use Rectangle;
use SvgGeneration;
use App\Models\Photo;
use App\Http\Requests\FormArcRequest;
use App\Http\Requests\FormLineRequest;
use App\Http\Requests\FormRectRequest;
use App\Http\Requests\FormTextRequest;
use App\Http\Requests\FormTriangleRequest;

class formController extends Controller
{

    public function line(FormLineRequest $request)
    {
        $image = Photo::find($request->id);
        $url = public_path('images') . '/' . $image->image;
        Line::drawLine($url, $request);
        $preview = new previewController();
        $preview->makePreview($image->image);
        return svgGeneration::svgGenerate($url);
    }

    public function rectangle(FormRectRequest $request)
    {

        $image = Photo::find($request->id);
        $url = public_path('images') . '/' . $image->image;
       Rectangle::drawRectangle($url, $request);

        $preview = new previewController();
        $preview->makePreview($image->image);
        return svgGeneration::svgGenerate($url);
    }

    public function arc(FormArcRequest $request)
    {

        $image = Photo::find($request->id);
        $url = public_path('images') . '/' . $image->image;
        \Arc::drawArc($url, $request);
        $preview = new previewController();
         $preview->makePreview($image->image);
        return svgGeneration::svgGenerate($url);
    }

    public function triangle(FormTriangleRequest $request)
    {

        $values = [
            $request->x1,  $request->y1,
            $request->x2,  $request->y2,
            $request->x3,  $request->y3,
        ];
        $image = Photo::find($request->id);
        $url = public_path('images') . '/' . $image->image;
        Triangle::drawTriangle($url, $request, $values);
        $preview = new previewController();
         $preview->makePreview($image->image);
        return svgGeneration::svgGenerate($url);
    }

    public function text(FormTextRequest $request)
    {

        $image = Photo::find($request->id);
        $url = public_path('images') . '/' . $image->image;
        Text::drawText($url, $request);
        $preview = new previewController();
         $preview->makePreview($image->image);
        return svgGeneration::svgGenerate($url);
    }
}
