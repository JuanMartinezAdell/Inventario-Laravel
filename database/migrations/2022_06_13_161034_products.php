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
        //
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("code", 30)->nullable();
            $table->text("description")->nullable();
            $table->string("model", 100)->nullable();
            $table->string("maker", 150)->nullable();
            $table->string("image")->nullable();
            $table->integer("stock");
            $table->enum("condition", ['activo', 'roto', 'desaparecido'])->default('activo');
            $table->timestamps();
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('products');
    }
};
