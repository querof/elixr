<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQrCodeFileReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qr_code_file_references', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('qrcodes_id');
            $table->unsignedBigInteger('file_references_id');
            $table->timestamps();
            $table->foreign('qrcodes_id')->references('id')->on('qrcodes')->onDelete('cascade');
            $table->foreign('file_references_id')->references('id')->on('file_references')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qr_code_file_references');
    }
}
