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
        Schema::create('dics', function (Blueprint $table) {
            $table->id();
            $table->text('lxid')->nullable();
            $table->text('lx')->nullable();
            $table->text('ly')->nullable();
            $table->text('lxalt')->nullable();
            $table->text('hm')->nullable();
            $table->text('phon')->nullable();
            $table->text('sec')->nullable();
            $table->text('predva')->nullable();
            $table->text('lxdial')->nullable();
            $table->text('va')->nullable();
            $table->text('ps')->nullable();
            $table->text('et')->nullable();
            $table->text('atr')->nullable();
            $table->text('abst')->nullable();
            $table->text('inf')->nullable();
            $table->text('nopos')->nullable();
            $table->text('pl')->nullable();
            $table->text('plpos')->nullable();
            $table->text('pm')->nullable();
            $table->text('idsn')->nullable();
            $table->text('cf')->nullable();
            $table->text('cfdial')->nullable();
            $table->text('agn')->nullable();
            $table->text('dif')->nullable();
            $table->text('sp')->nullable();
            $table->text('phr')->nullable();
            $table->text('mor')->nullable();
            $table->text('morcom')->nullable();
            $table->text('audio')->nullable();
            $table->text('alisto')->nullable();
            $table->text('prin')->nullable();
            $table->text('min')->nullable();
            $table->text('m_multiple')->nullable();
            $table->text('morinv')->nullable();
            $table->text('gl')->nullable();
            $table->text('psext')->nullable();
            $table->text('inv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dics');
    }
};
