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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('size')->nullable(); // 10cm, 12cm, 15cm, 18cm, dll.
            $table->string('flavor')->nullable(); // Chocolate, Vanilla, Redvelvet
            $table->string('filling')->nullable(); // Strawberry, Blueberry, Vanilla
            $table->string('cake_color')->nullable();
            $table->string('custom_text')->nullable(); // Tulisan di kue
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};