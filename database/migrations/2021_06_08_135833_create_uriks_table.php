<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUriksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uriks', function (Blueprint $table) {
            $table->id();
            $table->text('title_uz')->nullable();
            $table->text('title_ru')->nullable();
            $table->text('title_en')->nullable();
            $table->longText('description_uz')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('content_uz')->nullable();
            $table->longText('content_ru')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('images')->nullable();
            $table->string('cover_image')->nullable();
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
        Schema::dropIfExists('uriks');
    }
}
