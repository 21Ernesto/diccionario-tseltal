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
        Schema::create('sentidos', function (Blueprint $table) {
            $table->id();
            $table->text('idsn')->nullable();
            $table->text('sndial')->nullable();
            $table->text('de')->nullable();
            $table->text('pc')->nullable();
            $table->text('pc1')->nullable();
            $table->text('pc2')->nullable();
            $table->text('pc3')->nullable();
            $table->text('sc')->nullable();
            $table->text('exnum')->nullable();
            $table->text('de2')->nullable();
            $table->text('exnum2')->nullable();
            $table->text('de3')->nullable();
            $table->text('exnum3')->nullable();
            $table->text('sy')->nullable();
            $table->text('sncf')->nullable();
            $table->text('sncfdial')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentidos');
    }
};
