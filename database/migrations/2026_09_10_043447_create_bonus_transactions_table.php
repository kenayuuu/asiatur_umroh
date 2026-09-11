<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bonus_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('group_id')
                ->nullable()
                ->constrained('aganda_groups')
                ->nullOnDelete();
            $table->foreignId('source_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->enum('type', [
                'line_1',
                'line_2_pairing',
                'adjustment',
            ]);
            $table->decimal('amount', 15, 2)->default(0);
            $table->enum('status', [
                'pending',
                'confirmed',
                'cancelled',
                'reversed',
            ])->default('pending');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bonus_transactions');
    }
};
