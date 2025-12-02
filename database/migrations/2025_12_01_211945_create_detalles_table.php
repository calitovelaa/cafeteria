<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('producto_id');
            $table->string('nombre',30);
            $table->integer('precio');
            $table->string('imagen',30);
            $table->integer('cantidad');
            $table->unsignedBigInteger('pedido_id');
            $table->timestamps();
            $table->foreign('pedido_id')
            ->references('id')
            ->on('pedidos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles');
    }
};
