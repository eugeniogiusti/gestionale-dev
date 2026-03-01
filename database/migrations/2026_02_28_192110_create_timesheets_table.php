<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->smallInteger('year');
            $table->tinyInteger('month'); // 1-12
            $table->json('daily_hours');  // {"1": 8.0, "3": 6.5}
            $table->decimal('hourly_rate', 10, 2)->nullable(); // snapshot dal progetto al momento del salvataggio
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['project_id', 'year', 'month']);
            $table->index(['project_id', 'year', 'month']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timesheets');
    }
};
