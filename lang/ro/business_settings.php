<?php

return [
    // Page
    'title' => 'Setări companie', // Page title
    'sidebar_title' => 'Companie', // Title in the sidebar
    'description' => 'Configurează informațiile activității tale pentru facturi, oferte și documente oficiale.',

    // Tabs
    'personal_info' => 'Date personale',
    'legal_address' => 'Sediu legal',
    'tax_info' => 'Date fiscale',
    'contacts' => 'Contacte',
    'business_info' => 'Activitate',


    // Personal Info
    'owner_first_name' => 'Prenume',
    'owner_last_name' => 'Nume',

    // Legal Address
    'legal_address' => 'Adresă legală',
    'legal_city' => 'Oraș',
    'legal_zip' => 'Cod poștal',
    'legal_province' => 'Județ',
    'legal_country' => 'Țară',

    // Tax Info
    'tax_id' => 'Cod fiscal',
    'vat_number' => 'Cod TVA',
    'iban' => 'IBAN',

    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefix',
    'phone' => 'Telefon',

    // Business Info
    'business_name' => 'Nume activitate',
    'business_description' => 'Descriere servicii',
    'website' => 'Site web',
    'logo' => 'Logo',

    // Actions
    'save' => 'Salvează modificările',
    'cancel' => 'Anulează',
    'delete_logo' => 'Șterge logo-ul',
    'confirm_delete_logo' => 'Ești sigur că vrei să ștergi logo-ul?',

    // Messages
    'updated_successfully' => 'Setările companiei au fost actualizate cu succes',
    'logo_deleted' => 'Logo șters cu succes',

    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'ex. Mario',
        'owner_last_name' => 'ex. Rossi',
        'legal_address' => 'ex. Str. Roma 1',
        'legal_city' => 'ex. Milano',
        'legal_zip' => 'ex. 20100',
        'legal_province' => 'ex. MI',
        'legal_country' => 'ex. IT',
        'tax_id' => 'ex. RSSMRA80A01H501U',
        'vat_number' => 'ex. IT12345678901',
        'iban' => 'ex. IT60X0542811101000000123456',
        'email' => 'ex. info@companiata.ro',
        'certified_email' => 'ex. pec@companiata.ro',
        'phone_prefix' => 'ex. +39',
        'phone' => 'ex. 3331234567',
        'business_name' => 'ex. IT Software Solutions',
        'business_description' => 'ex. Consultanță și dezvoltare software personalizată',
        'website' => 'ex. https://companiata.ro',
    ],

    // Hints
    'logo_hint' => 'Formate acceptate: JPG, PNG, SVG. Dimensiune maximă: 2MB.',
    'iban_hint' => 'Codul IBAN al contului bancar (ex. IT60X0542811101000000123456)',

    // Validation
    'logo_must_be_image' => 'Fișierul trebuie să fie o imagine.',
    'logo_max_size' => 'Logo-ul nu poate depăși 2MB.',
    'logo_allowed_formats' => 'Formate permise: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Format IBAN invalid',
];
