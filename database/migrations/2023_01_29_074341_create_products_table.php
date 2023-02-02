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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->float('price');
            $table->float('offer_price');
            $table->integer('total_stock')->default(0);
            $table->mediumText('summary');
            $table->longText('description');
            $table->string('image');
            $table->enum('status',['active','deactive'])->default('active');
            $table->enum('conditions',['sale','hot'])->default('sale');
            $table->enum('choice',['popular','feature'])->default('popular');
            
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
        Schema::dropIfExists('products');
    }
};
