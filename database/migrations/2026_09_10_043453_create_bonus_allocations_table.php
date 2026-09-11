<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bonus_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('bonus_transaction_id')
                ->constrained('bonus_transactions')
                ->cascadeOnDelete();
            $table->enum('allocation_type', [
                'package_payment',
                'withdrawal',
            ]);
            $table->decimal('amount', 15, 2)->default(0);
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bonus_allocations');
    }
};
