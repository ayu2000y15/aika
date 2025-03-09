<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewFlagsTable extends Migration
{
    public function up()
    {
        Schema::create('view_flags', function (Blueprint $table) {
            $table->char('VIEW_FLG', 20)->primary()->comment('表示フラグID');
            $table->string('COMMENT', 300)->nullable()->comment('表示先');
            $table->integer('MAX_COUNT')->default(0)->comment('最大枚数');
            $table->string('SPARE1', 300)->nullable()->comment('予備１');
            $table->string('SPARE2', 300)->nullable()->comment('予備２');
            $table->timestamp('INS_DATE')->useCurrent()->comment('登録日');
            $table->timestamp('UPD_DATE')->useCurrent()->comment('更新日');
            $table->char('DEL_FLG', 2)->default('0')->comment('削除フラグ');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });

        DB::statement("ALTER TABLE `view_flags` comment 'HP表示管理'");

        // データの挿入
        $data = [
            ['00', '非公開', 0, null, null],
            ['TOP_back', 'TOPページ　背景', 1, null, null],
            ['CONTACT_back', '問い合わせページ　背景', 1, null, null],
            ['TOP_01', 'ロゴ（名前）', 1, null, null],
            ['TOP_02', 'メニューボタン', 0, null, null],
            ['TOP_03', 'SNSアイコン', 0, null, null],
            ['TOP_04', 'SNSアイコン（フッター）', 0, null, null],
            ['TOP_05', 'プロフィール　アバター', 1, null, null],
            ['TOP_06', 'プロフィール　マスコット', 1, null, null],
            ['TOP_07', 'ギャラリー画像', 0, null, null],
            ['TOP_08', 'グッズ画像', 0, null, null],
            ['TOP_title_profile', 'タイトル　プロフィール', 1, null, null],
            ['TOP_title_delivery', 'タイトル　配信', 1, null, null],
            ['TOP_title_info', 'タイトル　お知らせ', 1, null, null],
            ['TOP_title_gallery', 'タイトル　ギャラリー', 1, null, null],
            ['TOP_title_goods', 'タイトル　グッズ', 1, null, null],
            ['TOP_title_contact', 'タイトル　お問い合わせ', 1, null, null],
            ['TOP_title_guideline', 'タイトル　ガイドライン', 1, null, null],
            ['TOP_btn_goods', 'ボタン　GOODSはこちら', 1, null, null],
            ['TOP_btn_contact', 'ボタン　お問い合わせはこちらから', 1, null, null],
        ];

        foreach ($data as $item) {
            DB::table('view_flags')->insert([
                'VIEW_FLG' => $item[0],
                'COMMENT' => $item[1],
                'MAX_COUNT' => $item[2],
                'SPARE1' => $item[3],
                'SPARE2' => $item[4],
                'INS_DATE' => DB::raw('CURRENT_TIMESTAMP'),
                'UPD_DATE' => DB::raw('CURRENT_TIMESTAMP')
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('view_flags');
    }
}
