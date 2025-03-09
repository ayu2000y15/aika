<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $backImg = Image::where('VIEW_FLG', 'TOP_back')->active()->first();
        $logoImg = Image::where('VIEW_FLG', 'TOP_01')->active()->first();
        $menuBtnList = Image::where('VIEW_FLG', 'TOP_02')->active()->orderBy('PRIORITY')->get();
        $snsIcons = Image::where('VIEW_FLG', 'TOP_03')->active()->orderBy('PRIORITY')->get();
        $footerSnsIcons = Image::where('VIEW_FLG', 'TOP_04')->active()->orderBy('PRIORITY')->get();
        $avatar1 = Image::where('VIEW_FLG', 'TOP_05')->active()->first();
        $avatar2 = Image::where('VIEW_FLG', 'TOP_06')->active()->first();
        $mascot = Image::where('VIEW_FLG', 'TOP_07')->active()->first();

        $galleryImgList = Image::where('VIEW_FLG', 'TOP_08')->active()->orderBy('PRIORITY')->get();
        $goodsImgList = Image::where('VIEW_FLG', 'TOP_09')->active()->orderBy('PRIORITY')->get();
        $deliveryMovieList = Image::where('VIEW_FLG', 'TOP_10')->active()->orderBy('PRIORITY')->get();

        $contactBtn = Image::where('VIEW_FLG', 'TOP_btn_contact')->active()->first();
        $goodsBtn = Image::where('VIEW_FLG', 'TOP_btn_goods')->active()->first();

        $profileTitle = Image::where('VIEW_FLG', 'TOP_title_profile')->active()->first();
        $deliveryTitle = Image::where('VIEW_FLG', 'TOP_title_delivery')->active()->first();
        $infoTitle = Image::where('VIEW_FLG', 'TOP_title_info')->active()->first();
        $galleryTitle = Image::where('VIEW_FLG', 'TOP_title_gallery')->active()->first();
        $goodsTitle = Image::where('VIEW_FLG', 'TOP_title_goods')->active()->first();
        $contactTitle = Image::where('VIEW_FLG', 'TOP_title_contact')->active()->first();
        $guidelineTitle = Image::where('VIEW_FLG', 'TOP_title_guideline')->active()->first();

        $information = Information::where('PUBLIC_FLG', '1')->active()->orderBy('PRIORITY')->get();
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
