<?php

return [
    // Page
    'title' => 'Impostazioni Azienda', // Page title
    'sidebar_title' => 'Azienda', // Title in the sidebar
    'description' => 'Configura le informazioni della tua attività per fatture, preventivi e documenti ufficiali.',
    
    // Tabs
    'personal_info' => 'Dati Personali',
    'legal_address' => 'Sede Legale',
    'tax_info' => 'Dati Fiscali',
    'contacts' => 'Contatti',
    'business_info' => 'Attività',
    
    
    // Personal Info
    'owner_first_name' => 'Nome',
    'owner_last_name' => 'Cognome',
    
    // Legal Address
    'legal_address' => 'Indirizzo Legale',
    'legal_city' => 'Città',
    'legal_zip' => 'CAP',
    'legal_province' => 'Provincia',
    'legal_country' => 'Paese',
    
    // Tax Info
    'tax_id' => 'Codice Fiscale',
    'vat_number' => 'Partita IVA',
    'iban' => 'IBAN',
    'default_currency' => 'Valuta Predefinita',
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Prefisso',
    'phone' => 'Telefono',
    
    // Business Info
    'business_name' => 'Nome Attività',
    'business_description' => 'Descrizione Servizi',
    'website' => 'Sito Web',
    'logo' => 'Logo',
    
    // Actions
    'save' => 'Salva Modifiche',
    'cancel' => 'Annulla',
    'delete_logo' => 'Elimina Logo',
    'confirm_delete_logo' => 'Sei sicuro di voler eliminare il logo?',
    
    // Messages
    'updated_successfully' => 'Impostazioni azienda aggiornate con successo',
    'logo_deleted' => 'Logo eliminato con successo',
    
    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'es. Mario',
        'owner_last_name' => 'es. Rossi',
        'legal_address' => 'es. Via Roma 1',
        'legal_city' => 'es. Milano',
        'legal_zip' => 'es. 20100',
        'legal_province' => 'es. MI',
        'legal_country' => 'es. IT',
        'tax_id' => 'es. RSSMRA80A01H501U',
        'vat_number' => 'es. IT12345678901',
        'iban' => 'es. IT60X0542811101000000123456', 
        'email' => 'es. info@tuaazienda.it',
        'certified_email' => 'es. pec@tuaazienda.it',
        'phone_prefix' => 'es. +39',
        'phone' => 'es. 3331234567',
        'business_name' => 'es. IT Software Solutions',
        'business_description' => 'es. Consulenza e sviluppo software personalizzato',
        'website' => 'es. https://tuaazienda.it',
    ],
    
    // Hints
    'logo_hint' => 'Formati accettati: JPG, PNG, SVG. Dimensione massima: 2MB.',
    'iban_hint' => 'Codice IBAN del conto corrente (es. IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'Il file deve essere un\'immagine.',
    'logo_max_size' => 'Il logo non può superare 2MB.',
    'logo_allowed_formats' => 'Formati consentiti: JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Formato IBAN non valido', 
];