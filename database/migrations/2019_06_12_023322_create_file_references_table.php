<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_references', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('qrcodes_id');
            $table->string('name',50);
            $table->text('mime');
            $table->timestamps();
            $table->foreign('qrcodes_id')->references('id')->on('qrcodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_references');
    }
}
