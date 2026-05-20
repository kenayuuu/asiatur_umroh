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
        Schema::create('calons', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->unsignedSmallInteger('umur')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_paspor')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('akta_kelahiran')->nullable();
            $table->string('no_telepon');
            $table->string('email');
            $table->enum('jenis_perjalanan', ['wisata', 'umroh', 'haji'])->default('wisata');
            $table->date('tanggal_berangkat')->nullable();
            $table->foreignId('package_kegiatan_id')->constrained('package_kegiatans')->cascadeOnDelete();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calons');
    }
};
