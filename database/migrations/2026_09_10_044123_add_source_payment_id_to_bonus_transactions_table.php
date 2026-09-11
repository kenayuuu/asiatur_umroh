<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bonus_transactions', function (Blueprint $table) {
            $table->foreignId('source_payment_id')
                ->nullable()
                ->after('source_user_id')
                ->constrained('calon_payments')
                ->nullOnDelete();

            $table->unique([
                'source_payment_id',
                'type',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('bonus_transactions', function (Blueprint $table) {
            $table->dropUnique([
                'bonus_transactions_source_payment_id_type_unique',
            ]);

            $table->dropForeign([
                'source_payment_id',
            ]);

            $table->dropColumn('source_payment_id');
        });
    }
};
