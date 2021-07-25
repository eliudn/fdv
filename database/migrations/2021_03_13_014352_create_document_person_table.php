<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_person', function (Blueprint $table) {
            $table->id();
            $table->string('rute')->comment('ruta');
            $table->string('name')->comment('nombre del archivo');
            $table->unsignedBigInteger('user_id')->comment('Usuario que guarda el registro');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('document_person_id')->comment('id de tipo de documentacion');
            $table->foreign('document_person_id')->references('id')->on('types_document_person');
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('persons');
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
        Schema::dropIfExists('document_person');
    }
}
