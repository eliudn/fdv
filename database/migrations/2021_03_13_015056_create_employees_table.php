<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id')->comment('id persona');
            $table->foreign('person_id')->references('id')->on('persons');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('area');
            $table->date('date_entry')->comment('fecha de entrada');
            $table->date('retirement_date')->nullable()->nulcomment('fecha de salida');
            $table->integer('salary')->comment('salario');
            $table->unsignedBigInteger('position_id')->comment('id de cargo');
            $table->foreign('position_id')->references('id')->on('position');
            $table->unsignedBigInteger('user_id')->comment('id usuario');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('state')->default(true);
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
        Schema::dropIfExists('employees');
    }
}
