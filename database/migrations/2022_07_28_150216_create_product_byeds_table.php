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
        Schema::create('product_byeds', function (Blueprint $table) {
            $table->id();
            $table->integer('peoduct_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('phon')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('product_byeds');
    }
};
