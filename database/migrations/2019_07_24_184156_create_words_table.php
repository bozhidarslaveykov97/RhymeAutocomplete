<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            
            $table->string('word')->unique();
            
            $table->string('word_index1')->nullable();
            $table->string('word_index2')->nullable();
            $table->string('word_index3')->nullable();
            $table->string('word_index4')->nullable();
            $table->string('word_index5')->nullable();
            $table->string('word_index6')->nullable();
            $table->string('word_index7')->nullable();
            
            $table->timestamps();
            
            $table->index('word_index1');
            $table->index('word_index2');
            $table->index('word_index3');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
}
