<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class imageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $image = Photo::all()->where('user_id', '=', $id)->where('preview', '=', '1');
        $output = '';
        header('Content-type: image/jpeg');

        foreach ($image as $value) {
            $im = (asset('images') . '/' . $value->image);
            $output .= "<img src=$im> <br>";
            $value->id--;
            $output .= "<a href= 'image/$value->id'  }}> this </a>";
            $output .= $value->id . ' ' .  '<br>'  . $value->users->name . '<br>';
        }

        return $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png|max:2048',
        ]);

        $input = $request->all();
        $input['image'] = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $input['image']);
        $id = Auth::user()->id;
        $preview = new previewController();
        $previewImage = $preview->makePreview($input['image']);
        $time=Carbon::now();
        Photo::query()->insert([
            [
                'image' => $input['image'],
                'user_id' => $id,
                'preview' => '0',
                'created_at' => $time,
            ],
            [
                'image' => $previewImage,
                'user_id' => $id,
                'preview' => '1',
                'created_at' => $time,

            ],
        ]);

        return Response()->json(['success' => 'Image Upload Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::id();
        $image = Photo::query()->where('user_id', '=', $user_id)->find($id);
        $output = '';
        header('Content-type: image/jpeg');
        $im = (asset('images') . '/' . $image->image);
        $output .= "<img src=$im> <br>";
        $output .= $image->id . ' ' .  '<br>'  . $image->users->name . '<br>';
        return $output;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
