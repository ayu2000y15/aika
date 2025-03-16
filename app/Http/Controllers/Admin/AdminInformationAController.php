<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use App\Services\PlanetextToUrl;

class AdminInformationAController extends Controller
{
    protected $convert;
    public function __construct(PlanetextToUrl $planetextToUrl)
    {
        $this->convert = $planetextToUrl;
    }

    public function index(){
        $information = Information::where('SPARE1', '1')
        ->orderBy('PRIORITY')
        ->orderByDesc('INFORMATION_ID')->get();

        return view('admin.informationA', compact('information'));
    }

    public function store(Request $request){
        Information::create($request->all());

        return redirect()->route('admin.informationA')
        ->with('success', '「' . $request->TITLE . '」が登録されました。');
    }

    public function update(Request $request)
    {
        $title = Information::select('TITLE')->where('INFORMATION_ID', $request->INFORMATION_ID)->first();
        $info = Information::findOrFail($request->INFORMATION_ID);
        $info->update($request->all());
        return redirect()->route('admin.informationA')
        ->with('success', '「' . $title->TITLE . '」が更新されました。');
    }

    public function delete(Request $request)
    {
        $title = Information::select('TITLE')->where('INFORMATION_ID', $request->INFORMATION_ID)->first();
        Information::destroy($request->INFORMATION_ID);
        return redirect()->route('admin.informationA')
        ->with('success', '「' . $title->TITLE . '」が削除されました。');
    }
}
