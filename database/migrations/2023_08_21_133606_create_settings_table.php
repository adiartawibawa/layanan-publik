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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('category')->index();
            $table->string('setting_type')->index();
            $table->string('setting_key')->unique();
            $table->string('name');
            $table->string('string_value')->nullable();
            $table->string('file_value')->nullable();
            $table->longText('text_value')->nullable();
            $table->boolean('boolean_value')->nullable();
            $table->bigInteger('integer_value')->nullable();
            $table->decimal('decimal_value', 15, 2)->nullable();
            $table->string('validation_rules')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
