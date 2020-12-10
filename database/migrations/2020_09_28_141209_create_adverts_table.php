<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';	
            $table->id();
            $table->string('name',50);
            $table->string('nativ_language_1',25);
            $table->string('nativ_language_2',25)->nullable();
            $table->string('price',7);
            $table->string('language_1',25);
            $table->string('language_2',25)->nullable();
            $table->string('language_3',25)->nullable();
            $table->string('language_4',25)->nullable();
            $table->string('language_5',25)->nullable();
            $table->string('language_level_1',3);
            $table->string('language_level_2',3)->nullable();
            $table->string('language_level_3',3)->nullable();
            $table->string('language_level_4',3)->nullable();
            $table->string('language_level_5',3)->nullable();
            $table->string('country',20)->nullable();
            $table->string('city',20)->nullable();

            $table->longText('description');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
            
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
}
