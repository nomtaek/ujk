// database/migrations/xxxx_create_jenis_kopi_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_kopis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('asal_daerah');
            $table->enum('jenis', ['Arabika', 'Robusta', 'Liberika', 'Excelsa']);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2);
            $table->integer('stok')->default(0);
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_kopis');
    }
};
