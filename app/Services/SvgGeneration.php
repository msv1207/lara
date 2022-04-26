<?php

use ConvertApi\ConvertApi;

class SvgGeneration
{
    public static function svgGenerate($url)
    {
        $result = ConvertApi::convert(
            'svg',
            [
                'File' => $url,
            ],
            'png'
        );
        $result->saveFiles(public_path('images'));

        return Response()->json(['success' => 'Image Update Successfully']);
    }

}
