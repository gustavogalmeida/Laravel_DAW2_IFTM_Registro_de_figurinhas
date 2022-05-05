<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Clube;
use App\Models\Posicao;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogador', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 100);
            $table->string("data", 10);
            $table->foreignIdFor(Clube::class); // FK que linka no clube
            $table->foreign("clube_id")->references("id")->on("clube");
            $table->string("posicao", 100);
            $table->string("possuo", 10)->nullable();
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
        Schema::dropIfExists('jogador');
    }
};