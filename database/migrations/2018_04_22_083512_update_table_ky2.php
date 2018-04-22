<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableKy2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sinhvien', function (Blueprint $table) {
            $table->string('kickhoat2');
        });
        Schema::table('phongktx', function (Blueprint $table) {
            $table->string('chotrong2');
            $table->string('soluongdat2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
