<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_indexes_to_tables.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->index('category_id', 'idx_products_category');
            $table->index('manufacturer_id', 'idx_products_manufacturer');
            $table->index('is_active', 'idx_products_active');
            $table->index('is_featured', 'idx_products_featured');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->index('user_id', 'idx_orders_user');
            $table->index('status', 'idx_orders_status');
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->index('user_id', 'idx_cart_user');
            $table->index('session_id', 'idx_cart_session');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('idx_products_category');
            $table->dropIndex('idx_products_manufacturer');
            $table->dropIndex('idx_products_active');
            $table->dropIndex('idx_products_featured');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('idx_orders_user');
            $table->dropIndex('idx_orders_status');
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropIndex('idx_cart_user');
            $table->dropIndex('idx_cart_session');
        });
    }
};
