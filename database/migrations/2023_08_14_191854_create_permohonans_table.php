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
        Schema::create('permohonan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('layanan_id')->constrained('layanan');
            $table->foreignUuid('user_id')->constrained();
            $table->string('kode_mohon', 8)->unique();
            $table->boolean('is_valid')->default(false);
            $table->timestamps();
        });

        Schema::create('status_permohonan', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('permohonan_id')->constrained('permohonan');
            $table->char('aktivitas'); // 0 : dibuat, 1 : diterima, 2 : diproses, 3 : dikembalikan, 4 : selesai
            $table->longText('keterangan')->nullable();
            $table->boolean('is_readed')->default(false); // menampilkan notifikasi sudah terbaca atau belum
            $table->timestamps();
        });

        Schema::create('detail_permohonan', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('permohonan_id')->constrained('permohonan');
            $table->string('category')->index();
            $table->string('mohon_type')->index();
            $table->string('mohon_key');
            $table->string('name');
            $table->string('string_value')->nullable();
            $table->string('file_value')->nullable();
            $table->longText('text_value')->nullable();
            $table->boolean('boolean_value')->nullable();
            $table->bigInteger('integer_value')->nullable();
            $table->date('date_value')->nullable();
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
        Schema::dropIfExists('permohonan');
        Schema::dropIfExists('status_permohonan');
        Schema::dropIfExists('detail_permohonan');
    }
};
