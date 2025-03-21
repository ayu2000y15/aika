<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class AdminMovieController extends Controller
{
    protected $fileUploadService;

    public function index(){
        $movie = Image::where('VIEW_FLG', 'TOP_10')
        ->orderByRaw('PRIORITY is null')
        ->orderByRaw('PRIORITY = 0')
        ->orderBy('PRIORITY')->get();
        $deliveryMovieList = Image::where('VIEW_FLG', 'TOP_10')->active()
        ->orderByRaw('PRIORITY is null')
        ->orderByRaw('PRIORITY = 0')
        ->orderBy('PRIORITY')->get();

        return view('admin.movie', compact('movie', 'deliveryMovieList'));
    }

    public function store(Request $request){
        Image::create($request->all());

        return redirect()->route('admin.movie')
        ->with('success', '動画が登録されました。');
    }

    public function update(Request $request)
    {
        $movie = Image::where('IMAGE_ID', $request->IMAGE_ID);
        $movie->update([
            'FILE_NAME' => $request->FILE_NAME,
            //'PRIORITY' => $request->PRIORITY
        ]);
        return redirect()->route('admin.movie')
        ->with('success', '動画が更新されました。');
    }

    public function delete(Request $request)
    {
        Image::destroy($request->IMAGE_ID);
        return redirect()->route('admin.information')
        ->with('success', '動画が削除されました。');
    }

}
