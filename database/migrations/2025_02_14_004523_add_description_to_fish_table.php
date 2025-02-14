<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('fish', function (Blueprint $table) {
            $table->text('description')->nullable()->after('fishing_ground');
        });
    }

    public function down()
    {
        Schema::table('fish', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
