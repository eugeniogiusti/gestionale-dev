<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // Relazioni
            $table->foreignId('project_id')
                ->constrained()
                ->cascadeOnDelete();

            // Core
            $table->string('title');
            $table->text('description')->nullable();

            // Tipologia task (dev-oriented)
            $table->string('type', 20)->default('feature');
            // feature | bug | infra | refactor | research

            // Stato
            $table->string('status', 20)->default('todo');
            // todo | in_progress | blocked | done

            // Priorità
            $table->string('priority', 10)->nullable();
            // low | medium | high

            // Target date (non deadline rigida)
            $table->date('due_date')->nullable();

            // Ordinamento manuale (lista/kanban)
            $table->unsignedInteger('order')->default(0);

            // Timestamp
            $table->timestamps();

            // Indici utili per filtri/dashboard
            $table->index(['project_id', 'status']);
            $table->index(['project_id', 'type']);
            $table->index('due_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};