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
        Schema::create('manager_reports', function (Blueprint $table) {
            $table->string('emp_id', 10)->nullable();
            $table->integer('store_id')->default(0);
            $table->integer('days')->default(0);
            $table->integer('units')->default(0);
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manager_reports');
    }
};
