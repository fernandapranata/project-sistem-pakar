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
        Schema::table('solusis', function (Blueprint $table) {
            $table->string('kode_solusi')->unique()->after('id'); // Tambahkan kolom 'kode_solusi'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('solusis', function (Blueprint $table) {
            $table->dropColumn('kode_solusi'); // Hapus kolom jika dibatalkan
        });
    }
};