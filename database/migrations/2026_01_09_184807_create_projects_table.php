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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            
            // Client relation (nullable for internal projects)
            $table->foreignId('client_id')
                  ->nullable()
                  ->constrained('clients')
                  ->onDelete('set null');
            
            // Basic info
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            
            // Status and priority
            $table->enum('status', ['draft', 'in_progress', 'completed', 'archived'])
                  ->default('draft');
            $table->enum('priority', ['low', 'medium', 'high'])->nullable();
            
            // Dev links
            $table->string('repo_url')->nullable();
            $table->string('staging_url')->nullable();
            $table->string('production_url')->nullable();
            $table->string('figma_url')->nullable();
            $table->string('docs_url')->nullable();
            
            // Notes
            $table->text('notes')->nullable();
            
            // Timestamps and soft delete
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('status');
            $table->index('priority');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};