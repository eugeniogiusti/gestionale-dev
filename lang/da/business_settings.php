<?php

return [
    // Page
    'title' => 'Virksomhedsindstillinger', // Page title
    'sidebar_title' => 'Virksomhed', // Title in the sidebar
    'description' => 'Konfigurer oplysningerne om din virksomhed til fakturaer, tilbud og officielle dokumenter.',
    
    // Tabs
    'personal_info' => 'Personlige data',
    'legal_address' => 'Juridisk adresse',
    'tax_info' => 'Skatteoplysninger',
    'contacts' => 'Kontakter',
    'business_info' => 'Virksomhed',
    
    
    // Personal Info
    'owner_first_name' => 'Fornavn',
    'owner_last_name' => 'Efternavn',
    
    // Legal Address
    'legal_address' => 'Juridisk adresse',
    'legal_city' => 'By',
    'legal_zip' => 'Postnr.',
    'legal_province' => 'Provins',
    'legal_country' => 'Land',
    
    // Tax Info
    'tax_id' => 'Skattenummer',
    'vat_number' => 'Momsnummer',
    'iban' => 'IBAN',
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Forvalg',
    'phone' => 'Telefon',
    
    // Business Info
    'business_name' => 'Virksomhedsnavn',
    'business_description' => 'Servicebeskrivelse',
    'website' => 'Hjemmeside',
    'logo' => 'Logo',
    
    // Actions
    'save' => 'Gem ændringer',
    'cancel' => 'Annuller',
    'delete_logo' => 'Slet logo',
    'confirm_delete_logo' => 'Er du sikker på, at du vil slette logoet?',
    
    // Messages
    'updated_successfully' => 'Virksomhedsindstillinger opdateret',
    'logo_deleted' => 'Logo slettet',
    
    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'fx Mario',
        'owner_last_name' => 'fx Rossi',
        'legal_address' => 'fx Via Roma 1',
        'legal_city' => 'fx Milano',
        'legal_zip' => 'fx 20100',
        'legal_province' => 'fx MI',
        'legal_country' => 'fx IT',
        'tax_id' => 'fx RSSMRA80A01H501U',
        'vat_number' => 'fx IT12345678901',
        'iban' => 'fx IT60X0542811101000000123456', 
        'email' => 'fx info@dinvirksomhed.it',
        'certified_email' => 'fx pec@dinvirksomhed.it',
        'phone_prefix' => 'fx +39',
        'phone' => 'fx 3331234567',
        'business_name' => 'fx IT Software Solutions',
        'business_description' => 'fx Rådgivning og skræddersyet softwareudvikling',
        'website' => 'fx https://dinvirksomhed.it',
    ],
    
    // Hints
    'logo_hint' => 'Accepterede formater: JPG, PNG, SVG. Maks. størrelse: 2MB.',
    'iban_hint' => 'IBAN-kode for bankkontoen (fx IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'Filen skal være et billede.',
    'logo_max_size' => 'Logoet må ikke overstige 2MB.',
    'logo_allowed_formats' => 'Tilladte formater: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Ugyldigt IBAN-format', 
];
