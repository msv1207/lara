<?php

class Arc
{
    public static function drawArc($url, $request)
    {
        if (mime_content_type($url) == 'image/png') {
            $photo = (imagecreatefrompng($url));
            imagearc($photo, $request->x1, $request->y1, $request->width, $request->height, 0, 360, $request->color);
            imagepng($photo, $url, 0);
        } else {
            $photo = (imagecreatefromjpeg($url));
            imagearc($photo, $request->x1, $request->y1, $request->width, $request->height, 0, 360, $request->color);
            imagejpeg(($photo), $url);
        }

}
}
