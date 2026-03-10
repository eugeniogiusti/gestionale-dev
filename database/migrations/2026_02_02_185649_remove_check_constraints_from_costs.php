<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Removes CHECK constraints from costs table.
     * Works universally on SQLite, MySQL, PostgreSQL.
     */
    public function up(): void
    {
        // 1. Drop foreign keys first, then indexes (required by MySQL)
        Schema::table('costs', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropIndex(['project_id', 'paid_at']);
            $table->dropIndex(['type', 'recurring']);
            $table->dropIndex(['currency']);
        });

        // 2. Rename old table
        Schema::rename('costs', 'costs_backup');

        // 3. Create new table WITHOUT check constraints
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('EUR');
            $table->string('type')->default('tool');
            $table->boolean('recurring')->default(false);
            $table->string('recurring_period')->nullable();
            $table->date('paid_at');
            $table->string('receipt_path')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            // Indexes
            $table->index(['project_id', 'paid_at']);
            $table->index(['type', 'recurring']);
            $table->index('currency');
        });

        // 4. Copy data from backup
        DB::statement('INSERT INTO costs SELECT * FROM costs_backup');

        // 5. Drop backup table
        Schema::dropIfExists('costs_backup');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Laravel validation handles type/recurring_period validation
        // No need to restore CHECK constraints
    }
};
