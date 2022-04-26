<?php

class Text
{
    public static function drawText($url, $request)
    {
        if (mime_content_type($url) == 'image/png') {
            $photo = (imagecreatefrompng($url));
            imagestring($photo, $request->font, $request->x1, $request->y1, $request->text, $request->color);
            imagepng($photo, $url, 0);
        } else {
            $photo = (imagecreatefromjpeg($url));
            imagestring($photo, $request->font, $request->x1, $request->y1, $request->text, $request->color);
            imagejpeg(($photo), $url);
        }
}
}
