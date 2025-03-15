<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\PlanetextToUrl;

class HomeController extends Controller
{
    protected $convert;
    public function __construct(PlanetextToUrl $planetextToUrl)
    {
        $this->convert = $planetextToUrl;
    }
    public function index()
    {
        $backImg = Image::where('VIEW_FLG', 'TOP_back')->active()->first();
        $logoImg = Image::where('VIEW_FLG', 'TOP_01')->active()->first();
        $menuBtnList = Image::where('VIEW_FLG', 'TOP_02')->active()
        ->orderByRaw('PRIORITY is null')
        ->orderByRaw('PRIORITY = 0')
        ->orderBy('PRIORITY')->get();
        $snsIcons = Image::where('VIEW_FLG', 'TOP_03')->active()
        ->orderByRaw('PRIORITY is null')
        ->orderByRaw('PRIORITY = 0')
        ->orderBy('PRIORITY')->get();
        $footerSnsIcons = Image::where('VIEW_FLG', 'TOP_04')->active()
        ->orderByRaw('PRIORITY is null')
        ->orderByRaw('PRIORITY = 0')
        ->orderBy('PRIORITY')->get();
        $avatar1 = Image::where('VIEW_FLG', 'TOP_05')->active()->first();
        $avatar2 = Image::where('VIEW_FLG', 'TOP_06')->active()->first();
        $mascot = Image::where('VIEW_FLG', 'TOP_07')->active()->first();

        $galleryImgList = Image::where('VIEW_FLG', 'TOP_08')->active()
        ->orderByRaw('PRIORITY is null')
        ->orderByRaw('PRIORITY = 0')
        ->orderBy('PRIORITY')->get();
        $goodsImgList = Image::where('VIEW_FLG', 'TOP_09')
        ->where('SPARE2', '1')
        ->orderByRaw('PRIORITY is null')
        ->orderByRaw('PRIORITY = 0')
        ->active()->orderBy('PRIORITY')->get();
        $deliveryMovieList = Image::where('VIEW_FLG', 'TOP_10')->active()
        ->orderByRaw('PRIORITY is null')
        ->orderByRaw('PRIORITY = 0')
        ->orderBy('PRIORITY')->get();

        $contactBtn = Image::where('VIEW_FLG', 'TOP_btn_contact')->active()->first();
        $goodsBtn = Image::where('VIEW_FLG', 'TOP_btn_goods')->active()->first();

        $profileTitle = Image::where('VIEW_FLG', 'TOP_title_profile')->active()->first();
        $deliveryTitle = Image::where('VIEW_FLG', 'TOP_title_delivery')->active()->first();
        $infoTitle = Image::where('VIEW_FLG', 'TOP_title_info')->active()->first();
        $galleryTitle = Image::where('VIEW_FLG', 'TOP_title_gallery')->active()->first();
        $goodsTitle = Image::where('VIEW_FLG', 'TOP_title_goods')->active()->first();
        $contactTitle = Image::where('VIEW_FLG', 'TOP_title_contact')->active()->first();
        $guidelineTitle = Image::where('VIEW_FLG', 'TOP_title_guideline')->active()->first();

        $information = Information::where('PUBLIC_FLG', '1')->active()
        ->orderByRaw('PRIORITY is null')
        ->orderByRaw('PRIORITY = 0')
        ->orderBy('PRIORITY')->get();

        foreach($information as $info){
            $info->CONTENT = $this->convert->convertLink($info->CONTENT);
        }

        return view('home', compact('backImg'
        ,'logoImg'
        , 'menuBtnList'
        , 'snsIcons'
        , 'footerSnsIcons'
        , 'avatar1'
        , 'avatar2'
        , 'mascot'
        , 'galleryImgList'
        , 'goodsImgList'
        , 'deliveryMovieList'
        , 'contactBtn'
        , 'goodsBtn'
        , 'profileTitle'
        , 'deliveryTitle'
        , 'infoTitle'
        , 'galleryTitle'
        , 'goodsTitle'
        , 'contactTitle'
        , 'guidelineTitle'
        , 'information'
        ));
    }
}
