<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aganda_pairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('aganda_groups')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('left_member_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('right_member_id')->constrained('users')->restrictOnDelete();
            $table->unsignedBigInteger('bonus_amount')->default(500000);
            $table->enum('status', ['active', 'cancelled'])->default('active');
            $table->timestamps();

            $table->unique(
                ['group_id', 'left_member_id', 'right_member_id'],
                'aganda_pairs_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aganda_pairs');
    }
};
