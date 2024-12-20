<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveKodeFromSolusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solusis', function (Blueprint $table) {
            // Menghapus kolom kode
            $table->dropColumn('kode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solusis', function (Blueprint $table) {
            // Jika ingin rollback, tambahkan kolom kode kembali
            $table->string('kode')->unique();
        });
    }
}
