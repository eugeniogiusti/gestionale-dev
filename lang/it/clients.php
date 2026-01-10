<?php

return [
    // Page titles
    'title' => 'Clienti',
    'client' => 'Cliente',
    'clients_list' => 'Lista Clienti',
    'create_client' => 'Nuovo Cliente',
    'edit_client' => 'Modifica Cliente',
    'all_statuses' => 'Tutti gli stati',
    'client_details' => 'Dettagli Cliente',

    // Actions
    'add_client' => 'Aggiungi Cliente',
    'save' => 'Salva',
    'cancel' => 'Annulla',
    'edit' => 'Modifica',
    'delete' => 'Elimina',
    'restore' => 'Ripristina',
    'force_delete' => 'Elimina Definitivamente',
    'search' => 'Cerca',
    'filter' => 'Filtra',
    'reset' => 'Reimposta',

    // Form labels
    'name' => 'Nome / Ragione Sociale',
    'email' => 'Email',
    'status' => 'Stato',
    'vat_number' => 'Partita IVA',
    'phone_prefix' => 'Prefisso',
    'phone' => 'Telefono',
    'pec' => 'PEC',
    'website' => 'Sito Web',
    'linkedin' => 'LinkedIn',
    'notes' => 'Note',

    // Billing fields
    'billing_info' => 'Dati Fatturazione',
    'billing_address' => 'Indirizzo',
    'billing_city' => 'Città',
    'billing_zip' => 'CAP',
    'billing_province' => 'Provincia',
    'billing_country' => 'Nazione',
    'billing_recipient_code' => 'Codice Destinatario',

    // Contact info
    'contact_info' => 'Informazioni Contatto',
    'web_social' => 'Web & Social',

    // Status options
    'status_lead' => 'Lead',
    'status_active' => 'Attivo',
    'status_archived' => 'Archiviato',

    // Messages
    'created_successfully' => 'Cliente creato con successo',
    'updated_successfully' => 'Cliente aggiornato con successo',
    'deleted_successfully' => 'Cliente eliminato con successo',
    'restored_successfully' => 'Cliente ripristinato con successo',
    'permanently_deleted' => 'Cliente eliminato definitivamente',

    // Validation messages
    'validation' => [
        'name_required' => 'Il nome è obbligatorio',
        'email_required' => 'L\'email è obbligatoria',
        'email_invalid' => 'L\'email non è valida',
        'email_unique' => 'Questa email è già in uso',
        'status_required' => 'Lo stato è obbligatorio',
        'status_invalid' => 'Lo stato selezionato non è valido',
        'country_code_invalid' => 'Il codice nazione deve essere di 2 caratteri (es: IT, US)',
        'recipient_code_invalid' => 'Il codice destinatario deve essere di 7 caratteri',
        'website_invalid' => 'L\'URL del sito web non è valido',
        'linkedin_invalid' => 'L\'URL di LinkedIn non è valido',
    ],

    // Table headers
    'table' => [
        'name' => 'Nome',
        'email' => 'Email',
        'status' => 'Stato',
        'phone' => 'Telefono',
        'created_at' => 'Creato il',
        'actions' => 'Azioni',
    ],

    // Empty states
    'no_clients' => 'Nessun cliente trovato',
    'no_clients_description' => 'Inizia aggiungendo il tuo primo cliente',

    // Confirmations
    'confirm_delete' => 'Sei sicuro di voler eliminare questo cliente?',
    'confirm_force_delete' => 'Sei sicuro di voler eliminare definitivamente questo cliente? Questa azione non può essere annullata.',
    'confirm_restore' => 'Vuoi ripristinare questo cliente?',

    // Placeholders
    'placeholder' => [
        'name' => 'Es: Acme S.r.l.',
        'email' => 'Es: info@acme.it',
        'vat_number' => 'Es: IT12345678901',
        'phone' => 'Es: 333 1234567',
        'pec' => 'Es: acme@pec.it',
        'website' => 'Es: https://www.acme.it',
        'linkedin' => 'Es: https://www.linkedin.com/company/acme',
        'billing_address' => 'Es: Via Roma 10',
        'billing_city' => 'Es: Milano',
        'billing_zip' => 'Es: 20100',
        'billing_province' => 'Es: MI',
        'billing_country' => 'Es: IT',
        'billing_recipient_code' => 'Es: ABCDEFG',
        'search' => 'Cerca per nome o email...',
        'notes' => 'Aggiungi note...',
    ],

    // Hints
    'hint' => [
        'billing_country' => 'Codice ISO a 2 caratteri (IT, US, FR, ecc.)',
        'billing_recipient_code' => 'Codice univoco per fatturazione elettronica (7 caratteri)',
        'billing_province' => 'Sigla provincia (es: RM, MI, NA)',
    ],
];