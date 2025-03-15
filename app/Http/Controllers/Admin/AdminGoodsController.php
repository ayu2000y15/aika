<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\ViewFlag;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\DB;
use App\Services\PlanetextToUrl;

class AdminGoodsController extends Controller
{
    protected $fileUploadService;
    protected $convert;
    public function __construct(FileUploadService $fileUploadService,PlanetextToUrl $planetextToUrl)
    {
        $this->fileUploadService = $fileUploadService;
        $this->convert = $planetextToUrl;
    }

    public function index(Request $request)
    {
        $goods = DB::table('images as img')
        ->select('img.IMAGE_ID as IMAGE_ID',
            'img.FILE_NAME as FILE_NAME',
            'img.FILE_PATH as FILE_PATH',
            'img.VIEW_FLG as VIEW_FLG',
            'img.COMMENT as ALT',
            'img.PRIORITY as PRIORITY',
            'img.SPARE1 as URL',
            'img.SPARE2 as PUBLIC_FLG',
            'img.INS_DATE as INS_DATE',
            'view.COMMENT as V_COMMENT'
            )
        ->join('view_flags as view', 'img.VIEW_FLG', '=' ,'view.VIEW_FLG')
        ->where('img.VIEW_FLG', 'TOP_09')
        ->orderBy('img.VIEW_FLG')
        ->orderByRaw('img.PRIORITY is null')
        ->orderByRaw('img.PRIORITY = 0')
        ->orderBy('img.PRIORITY')
        ->orderBy('img.IMAGE_ID')
        ->get();

        return view('admin.goods', compact('goods'));
    }

    public function update(Request $request)
    {
        $img = Image::where('IMAGE_ID', $request->IMAGE_ID)->first();

        if($request->file('IMAGE') <> null){
            $uploadedFiles = $request->file('IMAGE');
            $filePath = 'img/shop';
            if ($img) {
                $this->fileUploadService->deleteFile($img->FILE_PATH . $img->FILE_NAME);
            }
            $result = $this->fileUploadService->updateFiles($uploadedFiles, $filePath, $request, $img);
            if ($result['success']) {
                return redirect()->route('admin.goods')
                ->with('success', 'グッズが変更されました。');
            } else {
                return redirect()->route('admin.goods')
                ->with('error', 'ファイルのアップロードに失敗しました: ' . $result['message']);
            }
        }else{
            $img->update([
                'SPARE1' => $request->SPARE1,
                'SPARE2' => $request->SPARE2
            ]);
        }
        return redirect()->route('admin.goods')
        ->with('success', 'グッズが変更されました。');
    }

}
