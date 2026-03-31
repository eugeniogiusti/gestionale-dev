<?php

return [
    // Page
    'title' => 'Paramètres de l’entreprise', // Page title
    'sidebar_title' => 'Entreprise', // Title in the sidebar
    'description' => 'Configure les informations de ton activité pour factures, devis et documents officiels.',
    
    // Tabs
    'personal_info' => 'Données personnelles',
    'legal_address' => 'Siège légal',
    'tax_info' => 'Données fiscales',
    'contacts' => 'Contacts',
    'business_info' => 'Activité',
    
    
    // Personal Info
    'owner_first_name' => 'Prénom',
    'owner_last_name' => 'Nom',
    
    // Legal Address
    'legal_address' => 'Adresse légale',
    'legal_city' => 'Ville',
    'legal_zip' => 'Code postal',
    'legal_province' => 'Province',
    'legal_country' => 'Pays',
    
    // Tax Info
    'tax_id' => 'Code fiscal',
    'vat_number' => 'N° de TVA',
    'iban' => 'IBAN',
    'default_currency' => 'Devise par Défaut',
    
    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Préfixe',
    'phone' => 'Téléphone',
    
    // Business Info
    'business_name' => 'Nom de l’entreprise',
    'business_description' => 'Description des services',
    'website' => 'Site web',
        'billing_tool_url' => 'ex. https://facturation.votreentreprise.fr',
    'logo' => 'Logo',
    
    // Actions
    'save' => 'Enregistrer les modifications',
    'cancel' => 'Annuler',
    'delete_logo' => 'Supprimer le logo',
    'confirm_delete_logo' => 'Es-tu sûr de vouloir supprimer le logo ?',
    
    // Messages
    'updated_successfully' => 'Paramètres d’entreprise mis à jour avec succès',
    'logo_deleted' => 'Logo supprimé avec succès',
    
    // Placeholders
    'placeholder' => [
        'owner_first_name' => 'ex. Mario',
        'owner_last_name' => 'ex. Rossi',
        'legal_address' => 'ex. Via Roma 1',
        'legal_city' => 'ex. Milan',
        'legal_zip' => 'ex. 20100',
        'legal_province' => 'ex. MI',
        'legal_country' => 'ex. IT',
        'tax_id' => 'ex. RSSMRA80A01H501U',
        'vat_number' => 'ex. IT12345678901',
        'iban' => 'ex. IT60X0542811101000000123456', 
        'email' => 'ex. info@tonentreprise.it',
        'certified_email' => 'ex. pec@tonentreprise.it',
        'phone_prefix' => 'ex. +39',
        'phone' => 'ex. 3331234567',
        'business_name' => 'ex. IT Software Solutions',
        'business_description' => 'ex. Conseil et développement logiciel sur mesure',
        'website' => 'ex. https://tonentreprise.it',
    ],
    
    // Hints
    'logo_hint' => 'Formats acceptés : JPG, PNG, SVG. Taille maximale : 2 Mo.',
    'iban_hint' => 'Code IBAN du compte bancaire (ex. IT60X0542811101000000123456)',
    
    // Validation
    'logo_must_be_image' => 'Le fichier doit être une image.',
    'logo_max_size' => 'Le logo ne peut pas dépasser 2 Mo.',
    'logo_allowed_formats' => 'Formats autorisés : JPEG, JPG, PNG, SVG.',
    'iban_invalid_format' => 'Format IBAN invalide', 

    // Integrations
    'integrations' => 'Intégrations',
    'github_pat' => 'Token d'Accès Personnel GitHub',
    'github_pat_hint' => 'Générez un token sur',
    'github_required_scopes' => 'Permissions requises',
    'github_scope_repo' => 'accès aux dépôts publics et privés',
    'github_scope_read_user' => 'lecture du profil utilisateur',
    'billing_tool' => 'Outil de facturation',
    'billing_tool_url' => 'URL de l\'outil de facturation',
    'billing_tool_url_hint' => 'Saisissez le lien de l\'outil que vous utilisez pour émettre des factures.',
];
