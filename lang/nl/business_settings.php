<?php

return [
    // Page
    'title' => 'Bedrijfsinstellingen', // Page title
    'sidebar_title' => 'Bedrijf', // Title in the sidebar
    'description' => 'Configureer de gegevens van je bedrijf voor facturen, offertes en officiële documenten.',
    
    // Tabs
    'personal_info' => 'Persoonlijke gegevens',
    'legal_address_tab' => 'Juridisch adres',
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

    // Fiscal Regime
    'fiscal_regime_section' => 'Belastingregime',
    'tax_regime' => 'Belastingregime',
    'substitute_tax_rate' => 'Vervangingsbelasting',
    'profitability_coefficient' => 'Winstgevendheidscoëfficiënt',
    'annual_revenue_cap' => 'Maximale Jaaromzet',
    'business_start_date' => 'Startdatum Bedrijf',

    // Pension
    'pension_section' => 'Pensioen',
    'pension_fund' => 'Pensioenfonds',
    'pension_registration_number' => 'Registratienummer',
    'pension_registration_date' => 'Inschrijfdatum',

    // ATECO
    'ateco_section' => 'ATECO-codes',
    'ateco_code' => 'Code',
    'ateco_description' => 'Beschrijving',
    'ateco_primary' => 'Primair',
    'ateco_add' => 'Toevoegen',
    'ateco_set_primary' => 'Als primair instellen',
    'ateco_no_codes' => 'Geen ATECO-codes toegevoegd',
    'ateco_delete_confirm' => 'Deze ATECO-code verwijderen?',
    
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
        'tax_regime' => 'bijv. Vereenvoudigd regime',
        'substitute_tax_rate' => 'bijv. 15',
        'profitability_coefficient' => 'bijv. 67',
        'annual_revenue_cap' => 'bijv. 85000',
        'pension_fund' => 'bijv. GS INPS',
        'pension_registration_number' => 'bijv. 3300',
        'ateco_code' => 'bijv. 62.01',
        'ateco_description' => 'bijv. Softwareontwikkeling',
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
        'invoice_note' => 'bijv. BTW-vrijgesteld o.g.v. art. 25 Wet OB',
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
        'tax_regime' => 'bijv. Vereenvoudigd regime',
        'substitute_tax_rate' => 'bijv. 15',
        'profitability_coefficient' => 'bijv. 67',
        'annual_revenue_cap' => 'bijv. 85000',
        'pension_fund' => 'bijv. GS INPS',
        'pension_registration_number' => 'bijv. 3300',
        'ateco_code' => 'bijv. 62.01',
        'ateco_description' => 'bijv. Softwareontwikkeling',
    'billing_tool_url_hint' => 'Vul de link in van de tool die je gebruikt om facturen uit te sturen.',

    // Documents tab
    'documents_tab' => 'Documenten',
    'documents' => [
        'title' => 'Persoonlijke documenten / BTW',
        'description' => 'Upload documenten gerelateerd aan uw bedrijf: BTW-registratie, ATECO-wijzigingen, enz.',
        'upload' => 'Document uploaden',
        'name' => 'Documentnaam',
        'notes' => 'Notities',
        'file' => 'Bestand',
        'uploaded_at' => 'Geüpload op',
        'no_documents' => 'Geen documenten geüpload.',
        'created' => 'Document geüpload.',
        'updated' => 'Document bijgewerkt.',
        'deleted' => 'Document verwijderd.',
        'delete_confirm' => 'Dit document verwijderen?',
        'placeholder_name' => 'bijv. BTW-registratiecertificaat',
        'placeholder_notes' => 'bijv. Officieel document van de Belastingdienst',
    ],

    // Invoice Note
    'invoice_note_section' => 'Factuurnoot',
    'invoice_note' => 'Juridische / fiscale noot',
    'invoice_note_hint' => 'Tekst die onderaan de factuur verschijnt.',
];
