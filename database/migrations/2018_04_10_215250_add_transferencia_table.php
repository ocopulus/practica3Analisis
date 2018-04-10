<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransferenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cuenta_in_id');
            $table->unsignedInteger('cuenta_out_id');
            $table->double('monto', 8,2);
            $table->foreign('cuenta_in_id')
                    ->references('id')
                    ->on('cuenta')
                    ->onDelete('cascade');
            $table->foreign('cuenta_out_id')
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
        Schema::dropIfExists('transferencia');
    }
}
