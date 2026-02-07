<?php

return [
    // Page
    'title' => 'Ustawienia firmy', // Page title
    'sidebar_title' => 'Firma', // Title in the sidebar
    'description' => 'Skonfiguruj informacje o swojej działalności dla faktur, ofert i dokumentów oficjalnych.',

    // Tabs
    'personal_info' => 'Dane osobowe',
    'legal_address' => 'Siedziba prawna',
    'tax_info' => 'Dane podatkowe',
    'contacts' => 'Kontakty',
    'business_info' => 'Działalność',


    // Personal Info
    'owner_first_name' => 'Imię',
    'owner_last_name' => 'Nazwisko',

    // Legal Address
    'legal_address' => 'Adres prawny',
    'legal_city' => 'Miasto',
    'legal_zip' => 'Kod pocztowy',
    'legal_province' => 'Województwo',
    'legal_country' => 'Kraj',

    // Tax Info
    'tax_id' => 'NIP',
    'vat_number' => 'VAT',
    'iban' => 'IBAN',
    'default_currency' => 'Domyślna Waluta',

    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefix',
    'phone' => 'Telefon',

    // Business Info
    'business_name' => 'Nazwa działalności',
    'business_description' => 'Opis usług',
    'website' => 'Strona www',
    'logo' => 'Logo',

    // Actions
    'save' => 'Zapisz zmiany',
    'cancel' => 'Anuluj',
    'delete_logo' => 'Usuń logo',
    'confirm_delete_logo' => 'Czy na pewno chcesz usunąć logo?',

    // Messages
    'updated_successfully' => 'Ustawienia firmy zaktualizowane pomyślnie',
    'logo_deleted' => 'Logo usunięte pomyślnie',

    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'np. Mario',
        'owner_last_name' => 'np. Rossi',
        'legal_address' => 'np. Via Roma 1',
        'legal_city' => 'np. Milano',
        'legal_zip' => 'np. 20100',
        'legal_province' => 'np. MI',
        'legal_country' => 'np. IT',
        'tax_id' => 'np. RSSMRA80A01H501U',
        'vat_number' => 'np. IT12345678901',
        'iban' => 'np. IT60X0542811101000000123456',
        'email' => 'np. info@twojafirma.pl',
        'certified_email' => 'np. pec@twojafirma.pl',
        'phone_prefix' => 'np. +39',
        'phone' => 'np. 3331234567',
        'business_name' => 'np. IT Software Solutions',
        'business_description' => 'np. Doradztwo i tworzenie oprogramowania na zamówienie',
        'website' => 'np. https://twojafirma.pl',
    ],

    // Hints
    'logo_hint' => 'Akceptowane formaty: JPG, PNG, SVG. Maksymalny rozmiar: 2MB.',
    'iban_hint' => 'Kod IBAN rachunku bankowego (np. IT60X0542811101000000123456)',

    // Validation
    'logo_must_be_image' => 'Plik musi być obrazem.',
    'logo_max_size' => 'Logo nie może przekraczać 2MB.',
    'logo_allowed_formats' => 'Dozwolone formaty: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Nieprawidłowy format IBAN',
];
