<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('business_settings', function (Blueprint $table) {
            $table->string('tax_regime')->nullable()->after('billing_tool_url');
            $table->decimal('substitute_tax_rate', 5, 2)->nullable()->after('tax_regime');
            $table->decimal('profitability_coefficient', 5, 2)->nullable()->after('substitute_tax_rate');
            $table->decimal('annual_revenue_cap', 12, 2)->nullable()->after('profitability_coefficient');
            $table->date('business_start_date')->nullable()->after('annual_revenue_cap');
            $table->string('pension_fund')->nullable()->after('business_start_date');
            $table->string('pension_registration_number')->nullable()->after('pension_fund');
            $table->date('pension_registration_date')->nullable()->after('pension_registration_number');
        });
    }

    public function down(): void
    {
        Schema::table('business_settings', function (Blueprint $table) {
            $table->dropColumn([
                'tax_regime',
                'substitute_tax_rate',
                'profitability_coefficient',
                'annual_revenue_cap',
                'business_start_date',
                'pension_fund',
                'pension_registration_number',
                'pension_registration_date',
            ]);
        });
    }
};
