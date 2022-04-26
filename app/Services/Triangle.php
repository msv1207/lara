<?php

class Triangle
{
    public static function drawTriangle($url, $request, $values)
    {
        if (mime_content_type($url) == "image/png") {
        $photo = (imagecreatefrompng($url));
        imagefilledpolygon($photo, $values, 3, $request->color);
        imagepng($photo, $url, 0);
    } else {
        $photo = (imagecreatefromjpeg($url));
        imagefilledpolygon($photo, $values, 3, $request->color);
        imagejpeg(($photo), $url);
    }

    }

}
