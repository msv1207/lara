<?php

class Line
{
    public static function drawLine($url, $request )
    {
        if (mime_content_type($url) == 'image/png') {
            $photo = imagecreatefrompng($url);
            imageline($photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagepng(($photo), $url);
        } else {
            $photo = imagecreatefromjpeg($url);
            imageline($photo, $request->x1, $request->y1, $request->x2, $request->y2, $request->color);
            imagejpeg(($photo), $url);
        }

}
}
