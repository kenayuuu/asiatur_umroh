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
        Schema::create('calon_cadangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->unsignedSmallInteger('umur')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_paspor')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('akta_kelahiran')->nullable();
            $table->string('no_telepon');
            $table->string('email')->nullable();
            $table->enum('jenis_perjalanan', [
                'wisata',
                'umroh',
                'haji',
            ]);
            $table->date('tanggal_berangkat')->nullable();
            $table->foreignId('package_kegiatan_id')
                ->nullable()
                ->constrained('package_kegiatans')
                ->nullOnDelete();
            $table->text('catatan')->nullable();
            // Siapa yang mendaftarkan calon ini
            $table->foreignId('registered_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Terhubung ke data calon utama setelah diproses
            $table->foreignId('calon_id')
                ->nullable()
                ->constrained('calons')
                ->nullOnDelete();

            $table->enum('status', [
                'pending',
                'diproses',
                'menjadi_calon',
                'ditolak',
            ])->default('pending')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_cadangan');
    }
};