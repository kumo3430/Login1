<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('level');
            $table->dropColumn('group');

            $table->unsignedInteger('bank_group_id');
            $table->unsignedInteger('bank_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('bank_id');
            $table->dropColumn('bank_group_id');
            $table->string('code');
            $table->unsignedTinyInteger('leave');
            $table->unsignedTinyInteger('group');
        });
    }
};
