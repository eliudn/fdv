<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('name1');
            $table->string('name2')->nullable();
            $table->string('last_name1');
            $table->string('last_name2')->nullable();
            $table->string('id_number')->unique()->comment('numero de cc');
            $table->unsignedBigInteger('document_type_id')->comment('tipo de documento');
            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->date('date_issue')->nullable()->comment('fecha de expedicion');
            $table->unsignedBigInteger('place_issue')->nullable()->comment('lugar de expecion');
            $table->foreign('place_issue')->references('id')->on('cities');
            $table->string('blood_type')->comment('tipo de sangre');
            $table->string('marital_status')->nullable()->comment('estado civil');
            $table->unsignedBigInteger('city_id')->comment('ciudad de recidencia');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('user_id')->comment('usuario de registro');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('state')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
