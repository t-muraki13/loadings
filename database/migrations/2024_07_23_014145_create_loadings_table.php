<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loadings', function (Blueprint $table) {
            $table->id();
            $table->datetime('receiving');
            $table->string('name');
            $table->string('nameKana');
            $table->text('number');
            $table->text('content');
            $table->string('charge');
            $table->datetime('issue');
            $table->text('remarks');
            $table->text('place');
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
        Schema::dropIfExists('loadings');
    }
};
