<?php

return [
    // Page
    'title' => "Paramètres de l'entreprise",
    'sidebar_title' => 'Entreprise',
    'description' => "Configure les informations de ton activité pour factures, devis et documents officiels.",

    // Tabs
    'personal_info' => 'Données personnelles',
    'legal_address_tab' => 'Siège légal',
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

    // Fiscal Regime
    'fiscal_regime_section' => 'Régime Fiscal',
    'tax_regime' => 'Régime Fiscal',
    'substitute_tax_rate' => 'Impôt Substitutif',
    'profitability_coefficient' => 'Coef. de Rentabilité',
    'annual_revenue_cap' => "Chiffre d'Affaires Annuel Max",
    'business_start_date' => "Début d'Activité",

    // Pension
    'pension_section' => 'Retraite',
    'pension_fund' => 'Caisse de Retraite',
    'pension_registration_number' => "Numéro d'Immatriculation",
    'pension_registration_date' => "Date d'Inscription",

    // ATECO
    'ateco_section' => 'Codes ATECO',
    'ateco_code' => 'Code',
    'ateco_description' => 'Description',
    'ateco_primary' => 'Principal',
    'ateco_add' => 'Ajouter',
    'ateco_set_primary' => 'Définir comme principal',
    'ateco_no_codes' => 'Aucun code ATECO ajouté',
    'ateco_delete_confirm' => 'Supprimer ce code ATECO ?',

    // Contacts
    'email' => 'Email',
    'certified_email' => 'PEC',
    'phone_prefix' => 'Préfixe',
    'phone' => 'Téléphone',

    // Business Info
    'business_name' => "Nom de l'entreprise",
    'business_description' => 'Description des services',
    'website' => 'Site web',
    'logo' => 'Logo',

    // Actions
    'save' => 'Enregistrer les modifications',
    'cancel' => 'Annuler',
    'delete_logo' => 'Supprimer le logo',
    'confirm_delete_logo' => 'Es-tu sûr de vouloir supprimer le logo ?',

    // Messages
    'updated_successfully' => "Paramètres d'entreprise mis à jour avec succès",
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
        'billing_tool_url' => 'ex. https://facturation.votreentreprise.fr',
        'tax_regime' => 'ex. Micro-entreprise',
        'substitute_tax_rate' => 'ex. 15',
        'profitability_coefficient' => 'ex. 67',
        'annual_revenue_cap' => 'ex. 85000',
        'pension_fund' => 'ex. GS INPS',
        'pension_registration_number' => 'ex. 3300',
        'ateco_code' => 'ex. 62.01',
        'ateco_description' => 'ex. Production de logiciels',
        'invoice_note' => "ex. Opération en franchise de TVA selon l'art. 293B du CGI",
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
    'github_pat' => "Token d'Accès Personnel GitHub",
    'github_pat_hint' => 'Générez un token sur',
    'github_required_scopes' => 'Permissions requises',
    'github_scope_repo' => 'accès aux dépôts publics et privés',
    'github_scope_read_user' => 'lecture du profil utilisateur',
    'billing_tool' => 'Outil de facturation',
    'billing_tool_url' => "URL de l'outil de facturation",
    'billing_tool_url_hint' => "Saisissez le lien de l'outil que vous utilisez pour émettre des factures.",

    // Documents tab
    'documents_tab' => 'Documents',
    'documents' => [
        'title' => 'Documents personnels / TVA',
        'description' => 'Téléchargez des documents liés à votre activité : immatriculation TVA, modifications ATECO, etc.',
        'upload' => 'Télécharger un document',
        'name' => 'Nom du document',
        'notes' => 'Notes',
        'file' => 'Fichier',
        'uploaded_at' => 'Téléchargé le',
        'no_documents' => 'Aucun document téléchargé.',
        'created' => 'Document téléchargé avec succès.',
        'updated' => 'Document mis à jour avec succès.',
        'deleted' => 'Document supprimé avec succès.',
        'delete_confirm' => 'Supprimer ce document ?',
        'placeholder_name' => "ex. Certificat d'immatriculation TVA",
        'placeholder_notes' => "ex. Document officiel de l'administration fiscale",
    ],

    // Invoice Note
    'invoice_note_section' => 'Note de facture',
    'invoice_note' => 'Note légale / fiscale',
    'invoice_note_hint' => 'Texte qui apparaîtra en bas de la facture.',
];
