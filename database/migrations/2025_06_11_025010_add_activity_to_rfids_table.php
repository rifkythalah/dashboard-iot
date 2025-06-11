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
        Schema::table('rfids', function (Blueprint $table) {
            $table->enum('activity', ['masuk', 'keluar'])->nullable();
            $table->timestamp('activity_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rfids', function (Blueprint $table) {
            //
        });
    }
};
