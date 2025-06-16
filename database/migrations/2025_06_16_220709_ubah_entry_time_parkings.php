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
        DB::statement('ALTER TABLE parkings MODIFY entry_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;');
    }
    public function down()
    {
        // Optional: kembalikan ke sebelumnya jika perlu
    }
};