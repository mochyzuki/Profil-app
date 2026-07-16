<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('mahasiswas', function (Blueprint $table) {
        $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
        // nullable() agar data lama tidak error
        // nullOnDelete() agar baris tidak ikut terhapus jika user dihapus
    });
}

public function down(): void
{
    Schema::table('mahasiswas', function (Blueprint $table) {
        $table->dropForeignIdFor(\App\Models\User::class);
        $table->dropColumn('user_id');
    });
}

    
};
