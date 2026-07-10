<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_quantities', function (Blueprint $table) {
            if (! Schema::hasColumn('product_quantities', 'quantity_change')) {
                $table->integer('quantity_change')->default(0)->after('quantity');
            }

            if (! Schema::hasColumn('product_quantities', 'remaining_quantity')) {
                $table->integer('remaining_quantity')->default(0)->after('quantity_change');
            }

            if (! Schema::hasColumn('product_quantities', 'reason')) {
                $table->string('reason')->nullable()->after('remaining_quantity');
            }
        });
    }

    public function down(): void
    {
        Schema::table('product_quantities', function (Blueprint $table) {
            $table->dropColumn(['quantity_change', 'remaining_quantity', 'reason']);
        });
    }
};
