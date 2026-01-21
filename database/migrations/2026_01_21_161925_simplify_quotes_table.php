<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $driver = DB::connection()->getDriverName();

        if ($driver === 'sqlite') {
            // SQLite
            Schema::dropIfExists('quotes');
            
            Schema::create('quotes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('project_id')->constrained()->onDelete('cascade');
                $table->date('quote_date');
                $table->string('title');
                $table->json('items');
                $table->text('notes')->nullable();
                $table->timestamps();

                $table->index('project_id');
                $table->index('quote_date');
            });
        } else {
            // MySQL/PostgreSQL 
            Schema::table('quotes', function (Blueprint $table) {
                $table->dropUnique(['quote_number']);
                $table->dropIndex(['status']);
                $table->dropForeign(['client_id']);
                $table->dropIndex(['client_id']);
            });

            Schema::table('quotes', function (Blueprint $table) {
                $table->dropColumn([
                    'quote_number',
                    'status',
                    'payment_terms',
                    'validity_days',
                    'total',
                    'client_id',
                ]);
            });

            if (Schema::hasColumn('quotes', 'expiry_date')) {
                Schema::table('quotes', function (Blueprint $table) {
                    $table->dropColumn('expiry_date');
                });
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
        
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('quote_number')->unique();
            $table->date('quote_date');
            $table->string('title');
            $table->json('items');
            $table->decimal('total', 10, 2);
            $table->text('payment_terms')->nullable();
            $table->integer('validity_days')->default(30);
            $table->date('expiry_date')->nullable();
            $table->string('status')->default('draft');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('project_id');
            $table->index('client_id');
            $table->index('quote_date');
            $table->index('status');
        });
    }
};