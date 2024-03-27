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
            $table->integer('created_by')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('brand_id')->nullable(); 
            $table->string('title'); 
            $table->string('slug')->nullable(); 
            $table->string('sku')->nullable(); 
            $table->double('new_price')->default(0.0);
            $table->double('old_price')->default(0.0); 
            $table->text('short_description')->nullable(); 
            $table->longText('description')->nullable(); 
            $table->text('additional_info')->nullable(); 
            $table->text('shipping_returns')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->integer('is_featured')->default(0); //(0 for not featured, 1 for featured)
            $table->integer('status')->default(0); // (0 for draft, 1 for active/published)
            $table->integer('is_deleted')->default(0); //  (0 for not deleted, 1 for deleted)
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
