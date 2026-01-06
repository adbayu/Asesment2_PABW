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
        Schema::table('products', function (Blueprint $table) {
            $table->string('nim_penjual', 20)->after('id')->index();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->string('nim_penjual', 20)->after('id')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('nim_penjual');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('nim_penjual');
        });
    }
};
