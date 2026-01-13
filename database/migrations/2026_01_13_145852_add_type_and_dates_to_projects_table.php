<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Tipo progetto (v1 semplice, 4 macro-categorie)
            $table->string('type', 30)->default('client_work')->after('status');
            $table->index('type');

            // Date target (opzionali)
            $table->date('start_date')->nullable()->after('notes');
            $table->date('due_date')->nullable()->after('start_date');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex(['type']);
            $table->dropColumn(['type', 'start_date', 'due_date']);
        });
    }
};