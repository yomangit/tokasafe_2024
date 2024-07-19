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
        Schema::create('workgroups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dept_by_business_unit_id')->nullable();
            $table->foreign('dept_by_business_unit_id')->references('id')->on('dept_by_business_units')->onDelete('cascade');
            $table->unsignedBigInteger('job_classe_id')->nullable();
            $table->foreign('job_classe_id')->references('id')->on('job_classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workgroups');
    }
};
