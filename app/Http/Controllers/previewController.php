<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class previewController extends Controller
{
    public function makePreview($image)
    {
            if (file_exists(public_path('images') .'/'. 'preview' . $image)) {
            unlink(public_path('images') .'/'. 'preview' . $image);
            }
        $filename =  (public_path('images') . '/' . $image);
        $percent = 0.5;
        list($width, $height) = getimagesize($filename);
        $newwidth = $width * $percent;
        $newheight = $height * $percent;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
            $url=public_path('images') . '/' . $image;
             if (mime_content_type($url) == 'image/png') {
                 $source = imagecreatefrompng($filename);
                 imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                 imagepng($thumb, public_path('images') . '/' . 'preview' . $image, 50);
             }
            else {
                $source = imagecreatefromjpeg($filename);
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagejpeg($thumb, public_path('images') . '/' . 'preview' . $image, 50);
            }
        return  'preview' . $image;

    }
}
