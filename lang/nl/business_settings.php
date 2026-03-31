<?php

return [
    // Page
    'title' => 'Bedrijfsinstellingen', // Page title
    'sidebar_title' => 'Bedrijf', // Title in the sidebar
    'description' => 'Configureer de gegevens van je bedrijf voor facturen, offertes en officiële documenten.',
    
    // Tabs
    'personal_info' => 'Persoonlijke gegevens',
    'legal_address' => 'Juridisch adres',
    'tax_info' => 'Fiscale gegevens',
    'contacts' => 'Contacten',
    'business_info' => 'Activiteit',
    
    
    // Personal Info
    'owner_first_name' => 'Voornaam',
    'owner_last_name' => 'Achternaam',
    
    // Legal Address
    'legal_address' => 'Juridisch adres',
    'legal_city' => 'Stad',
    'legal_zip' => 'Postcode',
    'legal_province' => 'Provincie',
    'legal_country' => 'Land',
    
    // Tax Info
    'tax_id' => 'Fiscaal nummer',
    'vat_number' => 'BTW-nummer',
    'iban' => 'IBAN',
    'default_currency' => 'Standaardvaluta',
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefix',
    'phone' => 'Telefoon',
    
    // Business Info
    'business_name' => 'Bedrijfsnaam',
    'business_description' => 'Dienstomschrijving',
    'website' => 'Website',
        'billing_tool_url' => 'bijv. https://facturatie.jouwbedrijf.nl',
    'logo' => 'Logo',
    
    // Actions
    'save' => 'Wijzigingen opslaan',
    'cancel' => 'Annuleren',
    'delete_logo' => 'Logo verwijderen',
    'confirm_delete_logo' => 'Weet je zeker dat je het logo wilt verwijderen?',
    
    // Messages
    'updated_successfully' => 'Bedrijfsinstellingen succesvol bijgewerkt',
    'logo_deleted' => 'Logo succesvol verwijderd',
    
    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'bv. Mario',
        'owner_last_name' => 'bv. Rossi',
        'legal_address' => 'bv. Via Roma 1',
        'legal_city' => 'bv. Milaan',
        'legal_zip' => 'bv. 20100',
        'legal_province' => 'bv. MI',
        'legal_country' => 'bv. IT',
        'tax_id' => 'bv. RSSMRA80A01H501U',
        'vat_number' => 'bv. IT12345678901',
        'iban' => 'bv. IT60X0542811101000000123456', 
        'email' => 'bv. info@jouwbedrijf.it',
        'certified_email' => 'bv. pec@jouwbedrijf.it',
        'phone_prefix' => 'bv. +39',
        'phone' => 'bv. 3331234567',
        'business_name' => 'bv. IT Software Solutions',
        'business_description' => 'bv. Advies en maatwerksoftwareontwikkeling',
        'website' => 'bv. https://jouwbedrijf.it',
    ],
    
    // Hints
    'logo_hint' => 'Geaccepteerde formaten: JPG, PNG, SVG. Maximale grootte: 2MB.',
    'iban_hint' => 'IBAN-code van de bankrekening (bv. IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'Het bestand moet een afbeelding zijn.',
    'logo_max_size' => 'Het logo mag niet groter zijn dan 2MB.',
    'logo_allowed_formats' => 'Toegestane formaten: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Ongeldig IBAN-formaat', 

    // Integrations
    'integrations' => 'Integraties',
    'github_pat' => 'GitHub Persoonlijk Toegangstoken',
    'github_pat_hint' => 'Genereer een token op',
    'github_required_scopes' => 'Vereiste machtigingen',
    'github_scope_repo' => 'toegang tot openbare en privérepositories',
    'github_scope_read_user' => 'gebruikersprofiel lezen',
    'billing_tool' => 'Facturatietool',
    'billing_tool_url' => 'URL van de facturatietool',
    'billing_tool_url_hint' => 'Vul de link in van de tool die je gebruikt om facturen uit te sturen.',
];
