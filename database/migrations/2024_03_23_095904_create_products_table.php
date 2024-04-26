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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->text('description')->nullable();
            $table->double('price',11,3)->default(0); // the size of the number is 11 digits is suits for simple project
            $table->string('photo');

            //foreign key
            $table->unsignedBigInteger('category_id');



            // foreign=  name of column
            // references= name of column in foreign table
            // on= name of foreign table
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
