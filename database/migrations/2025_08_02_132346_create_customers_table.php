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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('logo')->nullable();
            $table->string('fullname');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->integer('source');
            $table->integer('status');
            $table->string('file')->nullable();
            $table->unsignedBigInteger('assigned_staff_id');
            $table->foreign('assigned_staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_create');
            $table->foreign('user_create')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
