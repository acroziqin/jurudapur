<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFotoAndHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dapur', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('lokasi');
            $table->string('foto_header')->nullable()->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dapur', function (Blueprint $table) {
            $table->dropColumn('foto');
            $table->dropColumn('foto_header');
        });
    }
}
