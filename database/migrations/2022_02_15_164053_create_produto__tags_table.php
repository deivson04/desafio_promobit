<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto__tags', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('tag_id')->references('id')->on('tags'); 
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto__tags');
    }
}
