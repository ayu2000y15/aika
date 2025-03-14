<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class AdminMovieController extends Controller
{
    protected $fileUploadService;

    public function index(){
        $movie = Image::where('VIEW_FLG', 'TOP_10')->orderBy('PRIORITY')->get();
        $deliveryMovieList = Image::where('VIEW_FLG', 'TOP_10')->active()->orderBy('PRIORITY')->get();

        return view('admin.movie', compact('movie', 'deliveryMovieList'));
    }

    public function update(Request $request)
    {
        $movie = Image::where('IMAGE_ID', $request->IMAGE_ID);
        $movie->update([
            'FILE_NAME' => $request->FILE_NAME,
            //'PRIORITY' => $request->PRIORITY
        ]);
        return redirect()->route('admin.movie')
        ->with('success', '配信動画が更新されました。');
    }

}
