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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->timestamps();

            // $table->unsignedBigInteger('post_id');
            // $table->unsignedBigInteger('user_id');
            //foreign key
            $table->bigInteger('post_id')->references('id')->on('posts')
                ->onDelete('cascade')->onUpdate('cascade');
            //foreign key
            $table->bigInteger('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
