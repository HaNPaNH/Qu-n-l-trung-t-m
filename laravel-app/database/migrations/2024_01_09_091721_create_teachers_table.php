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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('class_id')->constrained('classrooms');
            $table->string('name', 32);
            $table->string('address', 32);
            $table->string('workplace', 255);
            $table->Integer('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
        // Schema::table('teachers', function (Blueprint $table) {
        //     $table->string('address', 255)->change();
        // });
    }
};


