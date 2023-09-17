<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('seq');        //原始題號順序
            $table->text('subject');
            $table->string('code');                     //題庫代碼
            $table->unsignedTinyInteger('level');       //題庫級別、甲,乙,丙,單一
            $table->unsignedTinyInteger('group');       //題組
            $table->boolean('multiple')->default(false);//單複選
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()
                                           ->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};