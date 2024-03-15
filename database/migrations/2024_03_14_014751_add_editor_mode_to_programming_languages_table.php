<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('programming_languages', function (Blueprint $table) {
            $table->string('editor_mode')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('programming_languages', function (Blueprint $table) {
            $table->dropColumn('editor_mode');
        });
    }
};
