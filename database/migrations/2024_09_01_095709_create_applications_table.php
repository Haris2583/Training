<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('post_jobs')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('experience');
            $table->string('current_job');
            $table->decimal('expected_salary', 10, 2)->nullable();
            $table->decimal('current_salary', 10, 2)->nullable();
            $table->string('cv_path'); // Path to the CV file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
