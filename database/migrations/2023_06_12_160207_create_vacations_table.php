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
        Schema::create('vacations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_city_id')->constrained()->cascadeOnDelete();
            $table->date('startDate');
            $table->date('endDate');
            $table->foreignId('provided_by')->nullable()->constrained('users', 'id')->nullOnDelete();
            $table->foreignId('booked_by')->nullable()->constrained('users','id')->nullOnDelete();
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacations');
    }
};
