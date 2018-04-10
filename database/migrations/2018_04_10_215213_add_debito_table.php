<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDebitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debito', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cuenta_id');
            $table->double('monto', 8,2);
            $table->string('descripcion');
            $table->foreign('cuenta_id')
                    ->references('id')
                    ->on('cuenta')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('debito');
    }
}
