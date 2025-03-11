<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralDefinition;

class AdminDefinitionController extends Controller
{
    protected $fileUploadService;

    public function index(){
        $definition = GeneralDefinition::orderBy('DEFINITION_ID')->get();

        return view('admin.definition', data: compact('definition'));
    }

    public function store(Request $request){
        GeneralDefinition::create($request->all());

        return redirect()->route('admin.definition')
        ->with('success', '「' . $request->DEFINITION . '」が登録されました。');
    }

    public function update(Request $request)
    {
        $title = GeneralDefinition::select('DEFINITION')->where('DEFINITION_ID', $request->DEFINITION_ID)->first();
        $def = GeneralDefinition::findOrFail($request->DEFINITION_ID);
        $def->update($request->all());
        return redirect()->route('admin.definition')
        ->with('success', '「' . $title->DEFINITION . '」が更新されました。');
    }

    public function delete(Request $request)
    {
        $title = GeneralDefinition::select('DEFINITION')->where('DEFINITION_ID', $request->DEFINITION_ID)->first();
        GeneralDefinition::destroy($request->DEFINITION_ID);
        return redirect()->route('admin.definition')
        ->with('success', '「' . $title->DEFINITION . '」が削除されました。');
    }
}
