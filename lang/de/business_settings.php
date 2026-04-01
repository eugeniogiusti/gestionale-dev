<?php

return [
    // Page
    'title' => 'Unternehmenseinstellungen', // Page title
    'sidebar_title' => 'Unternehmen', // Title in the sidebar
    'description' => 'Konfiguriere die Informationen deines Unternehmens für Rechnungen, Angebote und offizielle Dokumente.',
    
    // Tabs
    'personal_info' => 'Persönliche Daten',
    'legal_address_tab' => 'Rechtssitz',
    'tax_info' => 'Steuerdaten',
    'contacts' => 'Kontakte',
    'business_info' => 'Geschäft',
    
    
    // Personal Info
    'owner_first_name' => 'Vorname',
    'owner_last_name' => 'Nachname',
    
    // Legal Address
    'legal_address' => 'Rechtsadresse',
    'legal_city' => 'Stadt',
    'legal_zip' => 'PLZ',
    'legal_province' => 'Provinz',
    'legal_country' => 'Land',
    
    // Tax Info
    'tax_id' => 'Steuernummer',
    'vat_number' => 'USt-IdNr.',
    'iban' => 'IBAN',
    'default_currency' => 'Standardwährung',

    // Fiscal Regime
    'fiscal_regime_section' => 'Steuerregime',
    'tax_regime' => 'Steuerregime',
    'substitute_tax_rate' => 'Ersatzsteuer',
    'profitability_coefficient' => 'Rentabilitätskoeffizient',
    'annual_revenue_cap' => 'Maximaler Jahresumsatz',
    'business_start_date' => 'Gründungsdatum',

    // Pension
    'pension_section' => 'Rentenversicherung',
    'pension_fund' => 'Rentenkasse',
    'pension_registration_number' => 'Mitgliedsnummer',
    'pension_registration_date' => 'Einschreibedatum',

    // ATECO
    'ateco_section' => 'ATECO-Codes',
    'ateco_code' => 'Code',
    'ateco_description' => 'Beschreibung',
    'ateco_primary' => 'Primär',
    'ateco_add' => 'Hinzufügen',
    'ateco_set_primary' => 'Als primär festlegen',
    'ateco_no_codes' => 'Keine ATECO-Codes hinzugefügt',
    'ateco_delete_confirm' => 'Diesen ATECO-Code löschen?',
    
    // Contacts
    'email' => 'E-Mail',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Vorwahl',
    'phone' => 'Telefon',
    
    // Business Info
    'business_name' => 'Unternehmensname',
    'business_description' => 'Dienstleistungsbeschreibung',
    'website' => 'Webseite',
        'billing_tool_url' => 'z.B. https://billing.deinunternehmen.de',
        'tax_regime' => 'z.B. Pauschalregelung',
        'substitute_tax_rate' => 'z.B. 15',
        'profitability_coefficient' => 'z.B. 67',
        'annual_revenue_cap' => 'z.B. 85000',
        'pension_fund' => 'z.B. GS INPS',
        'pension_registration_number' => 'z.B. 3300',
        'ateco_code' => 'z.B. 62.01',
        'ateco_description' => 'z.B. Softwareentwicklung',
    'logo' => 'Logo',
    
    // Actions
    'save' => 'Änderungen speichern',
    'cancel' => 'Abbrechen',
    'delete_logo' => 'Logo löschen',
    'confirm_delete_logo' => 'Bist du sicher, dass du das Logo löschen möchtest?',
    
    // Messages
    'updated_successfully' => 'Unternehmenseinstellungen erfolgreich aktualisiert',
    'logo_deleted' => 'Logo erfolgreich gelöscht',
    
    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'z. B. Mario',
        'owner_last_name' => 'z. B. Rossi',
        'legal_address' => 'z. B. Via Roma 1',
        'legal_city' => 'z. B. Mailand',
        'legal_zip' => 'z. B. 20100',
        'legal_province' => 'z. B. MI',
        'legal_country' => 'z. B. IT',
        'tax_id' => 'z. B. RSSMRA80A01H501U',
        'vat_number' => 'z. B. IT12345678901',
        'iban' => 'z. B. IT60X0542811101000000123456', 
        'email' => 'z. B. info@deinunternehmen.it',
        'certified_email' => 'z. B. pec@deinunternehmen.it',
        'phone_prefix' => 'z. B. +39',
        'phone' => 'z. B. 3331234567',
        'business_name' => 'z. B. IT Software Solutions',
        'business_description' => 'z. B. Beratung und maßgeschneiderte Softwareentwicklung',
        'website' => 'z. B. https://deinunternehmen.it',
        'invoice_note' => 'z.B. Umsatzsteuerbefreit gem. §19 UStG',
    ],
    
    // Hints
    'logo_hint' => 'Akzeptierte Formate: JPG, PNG, SVG. Maximale Größe: 2MB.',
    'iban_hint' => 'IBAN des Bankkontos (z. B. IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'Die Datei muss ein Bild sein.',
    'logo_max_size' => 'Das Logo darf 2MB nicht überschreiten.',
    'logo_allowed_formats' => 'Erlaubte Formate: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Ungültiges IBAN-Format', 

    // Integrations
    'integrations' => 'Integrationen',
    'github_pat' => 'GitHub Personal Access Token',
    'github_pat_hint' => 'Token generieren auf',
    'github_required_scopes' => 'Erforderliche Berechtigungen',
    'github_scope_repo' => 'Zugriff auf öffentliche und private Repositories',
    'github_scope_read_user' => 'Benutzerprofil lesen',
    'billing_tool' => 'Abrechnungstool',
    'billing_tool_url' => 'URL des Abrechnungstools',
        'tax_regime' => 'z.B. Pauschalregelung',
        'substitute_tax_rate' => 'z.B. 15',
        'profitability_coefficient' => 'z.B. 67',
        'annual_revenue_cap' => 'z.B. 85000',
        'pension_fund' => 'z.B. GS INPS',
        'pension_registration_number' => 'z.B. 3300',
        'ateco_code' => 'z.B. 62.01',
        'ateco_description' => 'z.B. Softwareentwicklung',
    'billing_tool_url_hint' => 'Gib den Link des Tools ein, mit dem du Rechnungen ausstellst.',

    // Documents tab
    'documents_tab' => 'Dokumente',
    'documents' => [
        'title' => 'Persönliche Dokumente / Steuer-ID',
        'description' => 'Dokumente hochladen: Gewerbeanmeldung, ATECO-Änderungen usw.',
        'upload' => 'Dokument hochladen',
        'name' => 'Dokumentname',
        'notes' => 'Notizen',
        'file' => 'Datei',
        'uploaded_at' => 'Hochgeladen am',
        'no_documents' => 'Keine Dokumente hochgeladen.',
        'created' => 'Dokument hochgeladen.',
        'updated' => 'Dokument aktualisiert.',
        'deleted' => 'Dokument gelöscht.',
        'delete_confirm' => 'Dieses Dokument löschen?',
        'placeholder_name' => 'z.B. Gewerbeanmeldungszertifikat',
        'placeholder_notes' => 'z.B. Offizielles Dokument vom Finanzamt',
    ],

    // Invoice Note
    'invoice_note_section' => 'Rechnungshinweis',
    'invoice_note' => 'Rechtlicher / steuerlicher Hinweis',
    'invoice_note_hint' => 'Text, der am Ende der Rechnung erscheint.',
];
