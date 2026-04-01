<?php

return [
    // Page
    'title' => 'Setări companie', // Page title
    'sidebar_title' => 'Companie', // Title in the sidebar
    'description' => 'Configurează informațiile activității tale pentru facturi, oferte și documente oficiale.',

    // Tabs
    'personal_info' => 'Date personale',
    'legal_address_tab' => 'Sediu legal',
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
    'default_currency' => 'Moneda Implicită',

    // Fiscal Regime
    'fiscal_regime_section' => 'Regim Fiscal',
    'tax_regime' => 'Regim Fiscal',
    'substitute_tax_rate' => 'Impozit Substitutiv',
    'profitability_coefficient' => 'Coef. de Rentabilitate',
    'annual_revenue_cap' => 'Cifră de Afaceri Anuală Max.',
    'business_start_date' => 'Data Începerii Activității',

    // Pension
    'pension_section' => 'Pensie',
    'pension_fund' => 'Fond de Pensii',
    'pension_registration_number' => 'Număr de Înregistrare',
    'pension_registration_date' => 'Data Înscrierii',

    // ATECO
    'ateco_section' => 'Coduri ATECO',
    'ateco_code' => 'Cod',
    'ateco_description' => 'Descriere',
    'ateco_primary' => 'Principal',
    'ateco_add' => 'Adaugă',
    'ateco_set_primary' => 'Setează ca principal',
    'ateco_no_codes' => 'Niciun cod ATECO adăugat',
    'ateco_delete_confirm' => 'Ștergeți acest cod ATECO?',

    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefix',
    'phone' => 'Telefon',

    // Business Info
    'business_name' => 'Nume activitate',
    'business_description' => 'Descriere servicii',
    'website' => 'Site web',
        'billing_tool_url' => 'ex. https://facturare.companiadumneavoastra.ro',
        'tax_regime' => 'ex. Microîntreprindere',
        'substitute_tax_rate' => 'ex. 15',
        'profitability_coefficient' => 'ex. 67',
        'annual_revenue_cap' => 'ex. 85000',
        'pension_fund' => 'ex. GS INPS',
        'pension_registration_number' => 'ex. 3300',
        'ateco_code' => 'ex. 62.01',
        'ateco_description' => 'ex. Producție de software',
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
        'invoice_note' => 'ex. Scutit de TVA conform art. 310 Cod Fiscal',
    ],

    // Hints
    'logo_hint' => 'Formate acceptate: JPG, PNG, SVG. Dimensiune maximă: 2MB.',
    'iban_hint' => 'Codul IBAN al contului bancar (ex. IT60X0542811101000000123456)',

    // Validation
    'logo_must_be_image' => 'Fișierul trebuie să fie o imagine.',
    'logo_max_size' => 'Logo-ul nu poate depăși 2MB.',
    'logo_allowed_formats' => 'Formate permise: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Format IBAN invalid',

    // Integrations
    'integrations' => 'Integrări',
    'github_pat' => 'Token de Acces Personal GitHub',
    'github_pat_hint' => 'Generați un token pe',
    'github_required_scopes' => 'Permisiuni necesare',
    'github_scope_repo' => 'acces la depozite publice și private',
    'github_scope_read_user' => 'citirea profilului utilizatorului',
    'billing_tool' => 'Instrument de facturare',
    'billing_tool_url' => 'URL-ul instrumentului de facturare',
        'tax_regime' => 'ex. Microîntreprindere',
        'substitute_tax_rate' => 'ex. 15',
        'profitability_coefficient' => 'ex. 67',
        'annual_revenue_cap' => 'ex. 85000',
        'pension_fund' => 'ex. GS INPS',
        'pension_registration_number' => 'ex. 3300',
        'ateco_code' => 'ex. 62.01',
        'ateco_description' => 'ex. Producție de software',
    'billing_tool_url_hint' => 'Introduceți linkul instrumentului pe care îl folosiți pentru a emite facturi.',

    // Documents tab
    'documents_tab' => 'Documente',
    'documents' => [
        'title' => 'Documente personale / CIF',
        'description' => 'Încărcați documente legate de activitatea dvs.: înregistrare TVA, modificări ATECO etc.',
        'upload' => 'Încarcă document',
        'name' => 'Nume document',
        'notes' => 'Note',
        'file' => 'Fișier',
        'uploaded_at' => 'Încărcat pe',
        'no_documents' => 'Niciun document încărcat.',
        'created' => 'Document încărcat.',
        'updated' => 'Document actualizat.',
        'deleted' => 'Document șters.',
        'delete_confirm' => 'Ștergeți acest document?',
        'placeholder_name' => 'ex. Certificat înregistrare TVA',
        'placeholder_notes' => 'ex. Document oficial ANAF',
    ],

    // Invoice Note
    'invoice_note_section' => 'Notă factură',
    'invoice_note' => 'Notă legală / fiscală',
    'invoice_note_hint' => 'Text afișat în partea de jos a facturii.',
];
