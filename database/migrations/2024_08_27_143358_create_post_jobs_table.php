<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\JobStatus;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('title');
            $table->text('requirements');
            $table->text('job_description');
            $table->string('experience');
            $table->string('timing');
            $table->string('location');
            $table->string('education');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');    
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_jobs');
    }
};
