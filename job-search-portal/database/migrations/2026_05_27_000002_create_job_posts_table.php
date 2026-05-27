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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->nullable()->unique();
            $table->longText('description');
            $table->string('location')->nullable();
            $table->string('remote_type')->nullable();
            $table->string('experience_level')->nullable();
            $table->string('field_of_expertise')->nullable();
            $table->date('published_at')->nullable()->index();
            $table->string('apply_url')->nullable();
            $table->string('status')->default('active')->index();
            $table->timestamps();

            $table->index(['experience_level', 'field_of_expertise']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};