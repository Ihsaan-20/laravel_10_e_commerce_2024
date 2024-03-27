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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->nullable();
            $table->string('name');
            $table->string('color_code')->nullable();
            $table->integer('status')->default(0);// 0 - inactive, 1 - active;
            $table->integer('is_deleted')->default(0);// 0 - not deleted, 1 - deleted;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
