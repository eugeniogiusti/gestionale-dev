<?php

return [
    // Page
    'title' => 'Unternehmenseinstellungen', // Page title
    'sidebar_title' => 'Unternehmen', // Title in the sidebar
    'description' => 'Konfiguriere die Informationen deines Unternehmens für Rechnungen, Angebote und offizielle Dokumente.',
    
    // Tabs
    'personal_info' => 'Persönliche Daten',
    'legal_address' => 'Rechtssitz',
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
    
    // Contacts
    'email' => 'E-Mail',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Vorwahl',
    'phone' => 'Telefon',
    
    // Business Info
    'business_name' => 'Unternehmensname',
    'business_description' => 'Dienstleistungsbeschreibung',
    'website' => 'Webseite',
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
    ],
    
    // Hints
    'logo_hint' => 'Akzeptierte Formate: JPG, PNG, SVG. Maximale Größe: 2MB.',
    'iban_hint' => 'IBAN des Bankkontos (z. B. IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'Die Datei muss ein Bild sein.',
    'logo_max_size' => 'Das Logo darf 2MB nicht überschreiten.',
    'logo_allowed_formats' => 'Erlaubte Formate: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Ungültiges IBAN-Format', 
];
