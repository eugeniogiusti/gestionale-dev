<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('EUR');
            $table->enum('type', ['hosting', 'api', 'tool', 'license', 'ads'])->default('tool');
            $table->boolean('recurring')->default(false);
            $table->enum('recurring_period', ['monthly', 'yearly', 'quarterly'])->nullable();
            $table->date('paid_at');
            $table->string('receipt_path')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['project_id', 'paid_at']);
            $table->index(['type', 'recurring']);
            $table->index('currency');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('costs');
    }
};