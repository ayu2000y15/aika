<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;


use Illuminate\Support\Facades\Session;
class AdminInformationController extends Controller
{
    protected $fileUploadService;

    public function index(){
        $information = Information::orderBy('PRIORITY')->get();

        return view('admin.information', compact('information'));
    }

    public function store(Request $request){
        Information::create($request->all());

        return redirect()->route('admin.information')
        ->with('success', '「' . $request->TITLE . '」が登録されました。');
    }

    public function update(Request $request)
    {
        $title = Information::select('TITLE')->where('INFORMATION_ID', $request->INFORMATION_ID)->first();
        $info = Information::findOrFail($request->INFORMATION_ID);
        $info->update($request->all());
        return redirect()->route('admin.information')
        ->with('success', '「' . $title->TITLE . '」が更新されました。');
    }

    public function delete(Request $request)
    {
        $title = Information::select('TITLE')->where('INFORMATION_ID', $request->INFORMATION_ID)->first();
        Information::destroy($request->INFORMATION_ID);
        return redirect()->route('admin.information')
        ->with('success', '「' . $title->TITLE . '」が削除されました。');
    }
}
