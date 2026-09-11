<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('calon_payments', function (Blueprint $table) {
            $table->decimal('package_price', 15, 2)
                ->after('package_kegiatan_id')->default(0);

            $table->decimal('deposit_amount', 15, 2)
                ->after('package_price')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('calon_payments', function (Blueprint $table) {
            $table->dropColumn([
                'package_price',
                'deposit_amount',
            ]);
        });
    }
};
