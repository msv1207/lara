<?php

class Rectangle
{
    public static function drawRectangle($url, $request)
    {
        if (mime_content_type($url) == 'image/png') {
            $photo = (imagecreatefrompng($url));
            imagefilledrectangle($photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagepng($photo, $url, 0);
        } else {
            $photo = (imagecreatefromjpeg($url));
            imagefilledrectangle($photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagejpeg(($photo), $url);
        }
    }
}
