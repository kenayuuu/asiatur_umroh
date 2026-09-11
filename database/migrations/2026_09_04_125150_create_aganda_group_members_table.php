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
        Schema::create('aganda_group_members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('group_id')
                ->constrained('aganda_groups')
                ->cascadeOnDelete();

            $table->foreignId('calon_id')
                ->constrained('calons')
                ->restrictOnDelete();

            $table->foreignId('registered_by')
                ->constrained('users')
                ->restrictOnDelete();

            $table->enum('status', [
                'pending',
                'active',
                'cancelled',
            ])->default('pending');

            $table->timestamps();

            $table->unique(['group_id', 'calon_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aganda_group_members');
    }
};