<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDapurTableAddAlamat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // /* 1. Add 'slug' column and an index */
        // Schema::table('dapur', function ($table) {
        //     $table->string('slug', 255);
        //     $table->index('slug');
        // });

        /* 2. Update each post with a shiny new slug */
        $rows = DB::table('dapur')->get(['id', 'lokasi']);
        foreach ($rows as $row) {
            DB::table('dapur')
                ->where('id', $row->id)
                ->update(['alamat' => 'Jl. '.$row->lokasi.' '.$row->id]);
        }
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
