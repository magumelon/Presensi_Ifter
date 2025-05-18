<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNohpToMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('murid', function (Blueprint $table) {
        $table->string('nohp')->nullable();  // Sesuaikan tipe kolom jika perlu
    });
}

public function down()
{
    Schema::table('murid', function (Blueprint $table) {
        $table->dropColumn('nohp');
    });
}

}
