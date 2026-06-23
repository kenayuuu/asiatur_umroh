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
        Schema::create('package_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('nama_paket');
            $table->date('tanggal_berlangsung')->nullable();
            $table->string('destinasi');
            $table->unsignedBigInteger('harga')->default(0);
            $table->unsignedBigInteger('deposit')->default(0);
            $table->enum('kategori', ['wisata', 'umroh', 'haji'])->default('wisata');
            $table->string('image')->nullable();
            $table->string('durasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('rundown')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_kegiatans');
    }
};
