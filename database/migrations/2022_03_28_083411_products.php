<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->integer('coment_id')->nullable();
                $table->string('name')->nullable();
                $table->string('image')->nullable();
                $table->string('description')->nullable();
                $table->string('attrbute')->default('[]');
                $table->string('idia')->default('[]');
                $table->integer('price')->nullable();
                $table->integer('count')->default(1);
                $table->integer('discount');
                $table->integer('byed')->default(0);
                $table->integer('viseted')->default(0);
                $table->enum('category', ['mobile', 'computer','homeApp','asidApp','game']);
                $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('personal_access_tokens');
    }
}
