<?php

return [
    // Page
    'title' => 'Virksomhedsindstillinger', // Page title
    'sidebar_title' => 'Virksomhed', // Title in the sidebar
    'description' => 'Konfigurer oplysningerne om din virksomhed til fakturaer, tilbud og officielle dokumenter.',
    
    // Tabs
    'personal_info' => 'Personlige data',
    'legal_address_tab' => 'Juridisk adresse',
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
    'default_currency' => 'Standardvaluta',

    // Fiscal Regime
    'fiscal_regime_section' => 'Skatteordning',
    'tax_regime' => 'Skatteordning',
    'substitute_tax_rate' => 'Erstatningsskat',
    'profitability_coefficient' => 'Rentabilitetskoefficient',
    'annual_revenue_cap' => 'Maks. Årlig Omsætning',
    'business_start_date' => 'Startdato for Virksomhed',

    // Pension
    'pension_section' => 'Pension',
    'pension_fund' => 'Pensionsfond',
    'pension_registration_number' => 'Registreringsnummer',
    'pension_registration_date' => 'Indmeldelsesdato',

    // ATECO
    'ateco_section' => 'ATECO-koder',
    'ateco_code' => 'Kode',
    'ateco_description' => 'Beskrivelse',
    'ateco_primary' => 'Primær',
    'ateco_add' => 'Tilføj',
    'ateco_set_primary' => 'Angiv som primær',
    'ateco_no_codes' => 'Ingen ATECO-koder tilføjet',
    'ateco_delete_confirm' => 'Slet denne ATECO-kode?',
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Forvalg',
    'phone' => 'Telefon',
    
    // Business Info
    'business_name' => 'Virksomhedsnavn',
    'business_description' => 'Servicebeskrivelse',
    'website' => 'Hjemmeside',
        'billing_tool_url' => 'f.eks. https://fakturering.ditfirma.dk',
        'tax_regime' => 'f.eks. Forenklet ordning',
        'substitute_tax_rate' => 'f.eks. 15',
        'profitability_coefficient' => 'f.eks. 67',
        'annual_revenue_cap' => 'f.eks. 85000',
        'pension_fund' => 'f.eks. GS INPS',
        'pension_registration_number' => 'f.eks. 3300',
        'ateco_code' => 'f.eks. 62.01',
        'ateco_description' => 'f.eks. Softwareudvikling',
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
        'invoice_note' => 'fx Momsfritaget jf. CVR-loven',
    ],
    
    // Hints
    'logo_hint' => 'Accepterede formater: JPG, PNG, SVG. Maks. størrelse: 2MB.',
    'iban_hint' => 'IBAN-kode for bankkontoen (fx IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'Filen skal være et billede.',
    'logo_max_size' => 'Logoet må ikke overstige 2MB.',
    'logo_allowed_formats' => 'Tilladte formater: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Ugyldigt IBAN-format', 

    // Integrations
    'integrations' => 'Integrationer',
    'github_pat' => 'GitHub Personlig Adgangstoken',
    'github_pat_hint' => 'Generer et token på',
    'github_required_scopes' => 'Påkrævede tilladelser',
    'github_scope_repo' => 'adgang til offentlige og private repositories',
    'github_scope_read_user' => 'læse brugerprofil',
    'billing_tool' => 'Faktureringsværktøj',
    'billing_tool_url' => 'URL til faktureringsværktøj',
        'tax_regime' => 'f.eks. Forenklet ordning',
        'substitute_tax_rate' => 'f.eks. 15',
        'profitability_coefficient' => 'f.eks. 67',
        'annual_revenue_cap' => 'f.eks. 85000',
        'pension_fund' => 'f.eks. GS INPS',
        'pension_registration_number' => 'f.eks. 3300',
        'ateco_code' => 'f.eks. 62.01',
        'ateco_description' => 'f.eks. Softwareudvikling',
    'billing_tool_url_hint' => 'Indtast linket til det værktøj, du bruger til at udstede fakturaer.',

    // Documents tab
    'documents_tab' => 'Dokumenter',
    'documents' => [
        'title' => 'Personlige dokumenter / CVR',
        'description' => 'Upload dokumenter relateret til din virksomhed: CVR-registrering, ATECO-ændringer osv.',
        'upload' => 'Upload dokument',
        'name' => 'Dokumentnavn',
        'notes' => 'Noter',
        'file' => 'Fil',
        'uploaded_at' => 'Uploadet den',
        'no_documents' => 'Ingen dokumenter uploadet.',
        'created' => 'Dokument uploadet.',
        'updated' => 'Dokument opdateret.',
        'deleted' => 'Dokument slettet.',
        'delete_confirm' => 'Slet dette dokument?',
        'placeholder_name' => 'fx CVR-registreringscertifikat',
        'placeholder_notes' => 'fx Officielt dokument fra Skattestyrelsen',
    ],

    // Invoice Note
    'invoice_note_section' => 'Fakturanote',
    'invoice_note' => 'Juridisk / fiskal note',
    'invoice_note_hint' => 'Tekst der vises i bunden af fakturaen.',
];
