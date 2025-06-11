<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rfids', function (Blueprint $table) {
            $table->id();
            $table->string('id_rfid'); // tanpa ->unique()
            $table->string('rfid');
            $table->enum('status_rfid', ['aktif', 'mati'])->default('aktif');
            $table->integer('jumlah_rfid')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfids');
    }
};
