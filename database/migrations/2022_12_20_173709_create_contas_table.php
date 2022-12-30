<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id' );
            $table->unsignedBigInteger('tipo_conta_id' );
            $table->decimal('saldo', 17,2);
            $table->timestamps();
            //constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete(('cascade'));
            $table->foreign('tipo_conta_id')->references('id')->on('tipo_contas')->onDelete(('cascade'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas');
    }
}
