<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('quote_number')->unique();
            $table->date('quote_date');
            $table->string('title');
            $table->json('items'); // Array di righe preventivo
            $table->decimal('total', 10, 2);
            $table->text('payment_terms')->nullable();
            $table->integer('validity_days')->default(30);
            $table->enum('status', ['draft', 'sent', 'accepted', 'rejected', 'expired'])->default('draft');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('project_id');
            $table->index('client_id');
            $table->index('quote_date');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};