<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasentregaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
		 */
	public function up()
	{
		Schema::create('Notasentrega', function($table)
        {
            $table->increments('id');
            $table->string('hora');
            $table->string('datos_pedido',5000);
            $table->string('fecha_pedido',10);
             $table->date('fecha_pedidos');
            $table->string('tipo_alerta',5);
            $table->string('pantalla',5);
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
		Schema::drop('Notasentrega');
	}

}
