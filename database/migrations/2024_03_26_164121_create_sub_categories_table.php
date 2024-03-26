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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->integer('status')->default(0);// 0 - inactive, 1 - active;
            $table->integer('created_by')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('is_deleted')->default(0);// 0 - not deleted, 1 - deleted;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
