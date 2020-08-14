<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwelveConstellationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twelve_constellations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 10)->comment('星座名稱');
            $table->unsignedInteger('entire_score')->comment('整體運勢評分');
            $table->text('entire_content')->comment('整體運勢說明');
            $table->unsignedInteger('love_score')->comment('愛情運勢評分');
            $table->text('love_content')->comment('愛情運勢說明');
            $table->unsignedInteger('career_score')->comment('事業運勢評分');
            $table->text('career_content')->comment('事業運勢說明');
            $table->unsignedInteger('fortune_score')->comment('財運運勢說明');
            $table->text('fortune_content')->comment('財運運勢說明');
            $table->date('day')->comment('當天日期');
            $table->unique(['name', 'day']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('twelve_constellations');
    }
}
