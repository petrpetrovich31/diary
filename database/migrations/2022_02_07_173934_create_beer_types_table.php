<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBeerTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beer_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });

        DB::table('beer_types')
            ->insert([
                ['type' => 'Бутылка'],
                ['type' => 'Банка'],
                ['type' => 'Разливное']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beer_types');
    }
}
