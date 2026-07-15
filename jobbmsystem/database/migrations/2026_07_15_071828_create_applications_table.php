<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The applicant
            $table->foreignId('job_id')->constrained()->onDelete('cascade');   // The applied job
            $table->text('cover_letter');
            $table->string('resume_path');
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->dateTime('interview_at')->nullable(); // interview date and time assigned by employer
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};