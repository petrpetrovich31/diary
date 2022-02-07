<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBeerVolumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beer_volume', function (Blueprint $table) {
            $table->id();
            $table->float('volume');
        });

        DB::table('beer_volume')
            ->insert([
                ['volume' => 0.5],
                ['volume' => 0.45],
                ['volume' => 0.33],
                ['volume' => 0.25],
                ['volume' => 0.75],
                ['volume' => 1.0],
                ['volume' => 1.5],
                ['volume' => 2.0]
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beer_volume');
    }
}
