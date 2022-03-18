<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Closure;
use ConvertApi\ConvertApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class formController extends Controller
{
    //
    private $url;
    private $photo;

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function check($user_id)
    {
        if ($user_id != Auth::id() ) {
            die;
        }
    }

    private function svgGenerate()
    {
        ConvertApi::setApiSecret(env('API_KEY'));
        $result = ConvertApi::convert(
            'svg',
            [
            'File' => $this->url,
        ],
            'png'
        );
        $result->saveFiles(public_path('images'));

        return Response()->json(['success'=>'Image Update Successfully']);
    }

    public function line(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|min:0',
            'x1' => 'required|integer|min:0',
            'y1' => 'required|integer|min:0',
            'x2' => 'required|integer|min:0',
            'y2' => 'required|integer|min:0',
            'color' => 'required|integer|min:0',
        ]);
        $image = Photo::find($request->id);
        $this->check($image->user_id);
        $this->url = public_path('images') . '/' . $image->image;
        if (mime_content_type($this->url) == 'image/png') {
            $this->photo = imagecreatefrompng($this->url);
            imageline($this->photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagepng(($this->photo), $this->url);
        } else {
            $this->photo = imagecreatefromjpeg($this->url);
            imageline($this->photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagejpeg(($this->photo), $this->url);
        }
        $preview = new previewController();
        $previewImage=$preview->makePreview($image->image);
        return redirect()->action($this->svgGenerate());
    }

    public function rectangle(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|min:0',
            'x1' => 'required|integer|min:0',
            'y1' => 'required|integer|min:0',
            'x2' => 'required|integer|min:0',
            'y2' => 'required|integer|min:0',
            'color' => 'required|integer|min:0',
        ]);
        $image = Photo::find($request->id);
        $this->check($image->user_id);
        $this->url = public_path('images') . '/' . $image->image;
        if (mime_content_type($this->url) == 'image/png') {
            $this->photo = (imagecreatefrompng($this->url));
            imagefilledrectangle($this->photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagepng(($this->photo), $this->url);
        } else {
            $this->photo = (imagecreatefromjpeg($this->url));
            imagefilledrectangle($this->photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagejpeg(($this->photo), $this->url);
        }

        $preview = new previewController();
        $previewImage=$preview->makePreview($image->image);
        return redirect()->action($this->svgGenerate());
    }

    public function arc(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|min:0',
            'x1' => 'required|integer|min:0',
            'y1' => 'required|integer|min:0',
            'width' => 'required|integer|min:0',
            'height' => 'required|integer|min:0',
            'color' => 'required|integer|min:0',
        ]);
        $image = Photo::find($request->id);
        $this->check($image->user_id);
        $this->url = public_path('images') . '/' . $image->image;
        if (mime_content_type($this->url) == 'image/png') {
            $this->photo = (imagecreatefrompng($this->url));
            imagearc($this->photo, $request->x1, $request->y1, $request->width, $request->height, 0, 360, $request->color);
            imagepng(($this->photo), $this->url);
        } else {
            $this->photo = (imagecreatefromjpeg($this->url));
            imagearc($this->photo, $request->x1, $request->y1, $request->width, $request->height, 0, 360, $request->color);
            imagejpeg(($this->photo), $this->url);
        }
        $preview = new previewController();
        $previewImage=$preview->makePreview($image->image);
        return redirect()->action($this->svgGenerate());
    }

    public function triangle(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|min:0',
            'x1' => 'required|integer|min:0',
            'y1' => 'required|integer|min:0',
            'x2' => 'required|integer|min:0',
            'y2' => 'required|integer|min:0',
            'x3' => 'required|integer|min:0',
            'y3' => 'required|integer|min:0',
            'color' => 'required|integer|min:0',
        ]);
        $values = [
            $request->x1,  $request->y1,
            $request->x2,  $request->y2,
            $request->x3,  $request->y3,
        ];
        $image = Photo::find($request->id);
        $this->check($image->user_id);
        $this->url = public_path('images') . '/' . $image->image;
       var_dump((($this->url)));
        if (mime_content_type($this->url) == "image/png") {
            $this->photo = (imagecreatefrompng($this->url));
            imagefilledpolygon($this->photo, $values, 3, $request->color);
            imagepng(($this->photo), $this->url);
        } else {
            $this->photo = (imagecreatefromjpeg($this->url));
            imagefilledpolygon($this->photo, $values, 3, $request->color);
            imagejpeg(($this->photo), $this->url);
        }
        $preview = new previewController();
        $previewImage=$preview->makePreview($image->image);
        return redirect()->action($this->svgGenerate());
    }

    public function text(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|min:0',
            'x1' => 'required|integer|min:0',
            'y1' => 'required|integer|min:0',
            'font' => 'required|integer|min:0',
            'text' => 'required|string',
            'color' => 'required|integer|min:0',
        ]);
        $image = Photo::find($request->id);
        $this->check($image->user_id);
        $this->url = public_path('images') . '/' . $image->image;
        if (mime_content_type($this->url) == 'image/png') {
            $this->photo = (imagecreatefrompng($this->url));
            imagestring($this->photo, $request->font, $request->x1, $request->y1, $request->text, $request->color);
            imagepng(($this->photo), $this->url);
        } else {
            $this->photo = (imagecreatefromjpeg($this->url));
            imagestring($this->photo, $request->font, $request->x1, $request->y1, $request->text, $request->color);
            imagejpeg(($this->photo), $this->url);
        }
        $preview = new previewController();
        $previewImage=$preview->makePreview($image->image);
        return redirect()->action($this->svgGenerate());
    }

}
