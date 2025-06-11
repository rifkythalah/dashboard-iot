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
    Schema::create('flames', function (Blueprint $table) {
        $table->id();
        $table->string('sensor_id')->default('FS-001');
        $table->integer('indicator'); // Nilai analog sensor (0-100)
        $table->enum('level', ['Low', 'Medium', 'High']);
        $table->enum('status', ['Safe', 'Warning', 'Danger']);
        $table->timestamp('last_update')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flames');
    }
};
