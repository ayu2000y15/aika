<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\ViewFlag;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\DB;


class AdminPhotoController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function index(Request $request)
    {
        $viewFlg = ViewFlag::orderBy('VIEW_FLG')->get();
        $photos = DB::table('Images as img')
        ->select('img.IMAGE_ID as IMAGE_ID',
            'img.FILE_NAME as FILE_NAME',
            'img.FILE_PATH as FILE_PATH',
            'img.VIEW_FLG as VIEW_FLG',
            'img.COMMENT as ALT',
            'img.INS_DATE as INS_DATE',
            'view.COMMENT as V_COMMENT'
            )
        ->join('view_flags as view', 'img.VIEW_FLG', '=' ,'view.VIEW_FLG')
        ->orderBy('img.VIEW_FLG')
        ->orderBy('img.PRIORITY')
        ->orderBy('img.IMAGE_ID')
        ->get();

        return view('admin.photo', compact('viewFlg', 'photos'));
    }

    public function store(Request $request)
    {
        $uploadedFiles = $request->file('IMAGE');

        $filePath = 'img/hp';
        if($request->VIEW_FLG == 'TOP_08'){
            $filePath = 'img/gallery';
        }

        if($request->VIEW_FLG == 'TOP_09'){
            $filePath = 'img/shop';
        }

        $result = $this->fileUploadService->uploadFiles($uploadedFiles, $filePath, $request);
        if ($result['success']) {
            return redirect()->route('admin.photo')
            ->with('success', 'ファイルが正常にアップロードされました。');
        } else {
            return redirect()->route('admin.photo')
            ->with('error', 'ファイルのアップロードに失敗しました: ' . $result['message']);
        }
    }

    public function update(Request $request)
    {
        $img = Image::where('FILE_NAME', $request->FILE_NAME)->first();
        $img->update([
            'VIEW_FLG' => $request->VIEW_FLG_AFT,
            'PRIORITY' => $request->PRIORITY
        ]);
        return redirect()->route('admin')
        ->with('success', '写真の表示設定が変更されました。')
        ->with('activeTab', 'photos-entry');
    }

    public function delete(Request $request)
    {
        $img = Image::where('IMAGE_ID', $request->IMAGE_ID)->first();
        if ($img) {
            $this->fileUploadService->deleteFile($img->FILE_PATH . $img->FILE_NAME);
            $img->delete();
            return redirect()->route('admin.photo')
            ->with('success', '画像が削除されました。');
        }
        return redirect()->route('admin.photo')
        ->with('error', '画像の削除に失敗しました。');
    }

    public function bulkUpdate(Request $request)
    {
        foreach($request->SELECTED_PHOTOS as $photo){
            $img = Image::where('FILE_NAME', $photo);
            $img->update([
                'VIEW_FLG' => $request->BULK_VIEW_FLG,
                'PRIORITY' => $request->PRIORITY
            ]);
        }
        return redirect()->route('admin')
        ->with('message', '写真の表示設定が変更されました。')
        ->with('activeTab', 'photos-entry');
    }
}
