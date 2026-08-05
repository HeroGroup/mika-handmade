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
        Schema::table('user_carts', function (Blueprint $table) {
            if (! Schema::hasColumn('user_carts', 'product_attribute_id')) {
                $table->foreignId('product_attribute_id')->nullable()->after('product_id')->constrained()->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_carts', function (Blueprint $table) {
            if (Schema::hasColumn('user_carts', 'product_attribute_id')) {
                $table->dropConstrainedForeignId('product_attribute_id');
            }
        });
    }
};
