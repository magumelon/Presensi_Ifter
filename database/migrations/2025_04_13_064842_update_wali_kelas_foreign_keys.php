<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWaliKelasForeignKeys extends Migration
{
    public function up()
    {
        Schema::table('wali_kelas', function (Blueprint $table) {
            // Hanya menambahkan atau memperbaiki foreign key dengan CASCADE dan RESTRICT
            $table->dropForeign(['guru_id']);  // Menghapus constraint jika sudah ada
            $table->dropForeign(['kelas_id']); // Menghapus constraint jika sudah ada

            // Menambahkan kembali constraint dengan ON DELETE CASCADE dan ON UPDATE RESTRICT
            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::table('wali_kelas', function (Blueprint $table) {
            // Menghapus foreign key jika rollback
            $table->dropForeign(['guru_id']);
            $table->dropForeign(['kelas_id']);
        });
    }
}
