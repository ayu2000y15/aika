<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateGeneralDefinitionsTable extends Migration
{
    public function up()
    {
        Schema::create('general_definitions', function (Blueprint $table) {
            $table->string('DEFINITION', 300)->comment('定義');
            $table->string('ITEM', 300)->comment('内容');
            $table->string('EXPLANATION', 300)->comment('説明');
            $table->string('SPARE1', 300)->nullable()->comment('予備１');
            $table->string('SPARE2', 300)->nullable()->comment('予備２');
            $table->timestamp('INS_DATE')->useCurrent()->comment('登録日');
            $table->timestamp('UPD_DATE')->useCurrent()->comment('更新日');
            $table->char('DEL_FLG', 2)->default('0')->comment('削除フラグ');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });

        DB::statement("ALTER TABLE `general_definitions` comment '汎用テーブル'");
    }

    public function down()
    {
        Schema::dropIfExists('general_definitions');
    }
}
