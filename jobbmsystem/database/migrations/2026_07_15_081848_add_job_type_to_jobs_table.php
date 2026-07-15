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
    Schema::table('jobs', function (Blueprint $table) {
        // Adding the job_type column (e.g., Full-time, Part-time, Hybrid)
        $table->string('job_type')->after('description')->nullable();
    });
}

public function down(): void
{
    Schema::table('jobs', function (Blueprint $table) {
        $table->dropColumn('job_type');
    });
}
};
