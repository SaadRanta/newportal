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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('teachername');
            $table->string('course');
            $table->string('studentname');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->boolean('requested')->default(false);
            $table->unsignedBigInteger('teacher_id'); 
            $table->unsignedBigInteger('student_id'); 
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade'); // Define the desired ON DELETE action
            $table->unique(['teacher_id', 'student_id', 'course']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
