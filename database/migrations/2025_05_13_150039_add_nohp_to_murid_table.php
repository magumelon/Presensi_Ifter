<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNohpToMuridTable extends Migration
{
    public function up()
    {
        Schema::table('murid', function (Blueprint $table) {
            $table->string('nohp', 20)->nullable()->after('email');
        });
    }

    public function down()
    {
        Schema::table('murid', function (Blueprint $table) {
            $table->dropColumn('nohp');
        });
    }
}
