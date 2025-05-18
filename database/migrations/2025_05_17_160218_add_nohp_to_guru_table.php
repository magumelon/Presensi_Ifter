<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNohpToGuruTable extends Migration
{
    public function up()
{
    Schema::table('guru', function (Blueprint $table) {
        $table->string('nohp')->nullable();
    });
}

public function down()
{
    Schema::table('guru', function (Blueprint $table) {
        $table->dropColumn('nohp');
    });
}

}


