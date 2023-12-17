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
        Schema::create('exnums', function (Blueprint $table) {
            $table->id();
            $table->text('exnum')->nullable();
            $table->text('xv')->nullable();
            $table->text('xdial')->nullable();
            $table->text('xe')->nullable();
            $table->text('audio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exnums');
    }
};
