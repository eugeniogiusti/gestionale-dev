<?php

namespace Database\Seeders;

use App\Models\BusinessSettings;
use Illuminate\Database\Seeder;

class BusinessSettingsSeeder extends Seeder
{
    public function run(): void
    {
        BusinessSettings::updateOrCreate(['id' => 1], [
            'owner_first_name'   => 'John',
            'owner_last_name'    => 'Doe',
            'business_name'      => 'Doe Digital Studio',
            'business_description' => 'Freelance web development and SaaS products.',
            'legal_address'      => 'Via Garibaldi 15',
            'legal_city'         => 'Roma',
            'legal_zip'          => '00153',
            'legal_province'     => 'RM',
            'legal_country'      => 'IT',
            'tax_id'             => 'DOEJHN85M01H501Z',
            'vat_number'         => 'IT12345678901',
            'iban'               => 'IT60X0542811101000000123456',
            'default_currency'   => 'EUR',
            'email'              => 'john@doedigital.com',
            'certified_email'    => 'doedigital@pec.it',
            'phone_prefix'       => '+39',
            'phone'              => '3331234567',
            'website'            => 'https://doedigital.com',
        ]);
    }
}
