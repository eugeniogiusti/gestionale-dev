<?php

return [
    // Navigation
    'nav_title' => 'Preventivi',
    
    // Page titles
    'title' => 'Preventivi',
    'quote_list' => 'Elenco Preventivi',
    'add_quote' => 'Aggiungi Preventivo',
    'create_quote' => 'Crea Preventivo',
    'edit_quote' => 'Modifica Preventivo',
    'view_project' => 'Vedi Progetto',
    
    // Fields
    'quote_number' => 'Numero Preventivo',
    'quote_date' => 'Data Preventivo',
    'quote_title' => 'Titolo',
    'items' => 'Servizi Offerti',
    'item_description' => 'Descrizione Servizio',
    'item_price' => 'Prezzo',
    'total' => 'Totale',
    'payment_terms' => 'Modalità di Pagamento',
    'validity_days' => 'Valido per (giorni)',
    'expiry_date' => 'Data Scadenza',
    'status' => 'Stato',
    'notes' => 'Note',
    'project' => 'Progetto',
    'client' => 'Cliente',
    
    // Status
    'status_draft' => 'Bozza',
    'status_sent' => 'Inviato',
    'status_accepted' => 'Accettato',
    'status_rejected' => 'Rifiutato',
    'status_expired' => 'Scaduto',
    
    // Actions
    'add_item' => 'Aggiungi Servizio',
    'remove_item' => 'Rimuovi',
    'download' => 'Scarica PDF',
    'save_draft' => 'Salva come Bozza',
    'mark_sent' => 'Segna come Inviato',
    'mark_accepted' => 'Segna come Accettato',
    'mark_rejected' => 'Segna come Rifiutato',
    
    // Messages
    'created_successfully' => 'Preventivo creato con successo',
    'updated_successfully' => 'Preventivo aggiornato con successo',
    'status_updated' => 'Stato del preventivo aggiornato con successo',
    'deleted_successfully' => 'Preventivo eliminato con successo',
    'confirm_delete' => 'Sei sicuro di voler eliminare questo preventivo?',
    'no_quotes' => 'Nessun preventivo',
    'no_quotes_description' => 'Crea il tuo primo preventivo per iniziare.',
    
    // Validation
    'items_required' => 'È necessario almeno un servizio',
    'items_min' => 'È necessario almeno un servizio',
    'item_description_required' => 'La descrizione del servizio è obbligatoria',
    'item_price_required' => 'Il prezzo è obbligatorio',
    'item_price_min' => 'Il prezzo deve essere maggiore di zero',
    
    // Placeholders
    'placeholder' => [
        'title' => 'es. Preventivo Sviluppo Landing Page',
        'item_description' => 'es. Design UI/UX',
        'item_price' => '0.00',
        'payment_terms' => 'es. 50% anticipo, 50% a consegna',
        'validity_days' => '30',
        'notes' => 'Note opzionali...',
        'search' => 'Cerca preventivi...',
    ],
    
    // Hints
    'payment_terms_hint' => 'Descrivi come il cliente deve pagare (es. rate, milestone)',
    'validity_days_hint' => 'Numero di giorni per cui questo preventivo è valido (default: 30 giorni)',
    'items_hint' => 'Aggiungi tutti i servizi inclusi in questo preventivo',
    
    // Stats
    'total_quotes' => 'Preventivi Totali',
    'draft_quotes' => 'Bozze',
    'sent_quotes' => 'Inviati',
    'accepted_quotes' => 'Accettati',
    'rejected_quotes' => 'Rifiutati',
    'total_value' => 'Valore Totale (Accettati)',
    'recent_quotes' => 'Preventivi Recenti',
    'by_status' => 'Preventivi per Stato',
    
    // Filters
    'filter_by_project' => 'Filtra per Progetto',
    'filter_by_status' => 'Filtra per Stato',
    'all_projects' => 'Tutti i Progetti',
    'all_statuses' => 'Tutti gli Stati',
    
    // PDF
    'pdf_title' => 'PREVENTIVO',
    'pdf_valid_until' => 'Valido fino al',
    'pdf_services_offered' => 'SERVIZI OFFERTI',
    'pdf_payment_terms' => 'MODALITÀ DI PAGAMENTO',
];