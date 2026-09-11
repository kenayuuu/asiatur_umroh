<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calon_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_id')
                ->constrained('calons')
                ->cascadeOnDelete();
            $table->foreignId('package_kegiatan_id')
                ->constrained('package_kegiatans')
                ->restrictOnDelete();
            $table->enum('payment_type', [
                'dp',
                'pelunasan',
            ]);
            $table->decimal('amount', 15, 2)->default(0);
            $table->enum('status', [
                'pending',
                'paid',
                'failed',
                'cancelled',
            ])->default('pending');
            $table->timestamp('paid_at')->nullable();
            $table->foreignId('confirmed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calon_payments');
    }
};
