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
        Schema::table('kerusakans', function (Blueprint $table) {
            $table->string('kode_kerusakan')->unique()->after('id'); 
        });
    }
    
    public function down()
    {
        Schema::table('kerusakans', function (Blueprint $table) {
            $table->dropColumn('kode_kerusakan'); 
        });
    }    
};
