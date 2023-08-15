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
        Schema::create('layanan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->char('estimasi');
            $table->text('desc')->nullable();
        });

        Schema::create('ketentuan', function (Blueprint $table) {
            $table->id();
            $table->uuidMorphs('ketentuan');
            $table->string('name');
            $table->text('desc');
            $table->enum('type', ['formulir', 'prasyarat'])->nullable();
            $table->boolean('is_required')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
        Schema::dropIfExists('ketentuan');
    }
};
