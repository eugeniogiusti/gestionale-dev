<?php

return [
    // Page titles
    'title' => 'Progetti',
    'projects_list' => 'Lista Progetti',
    'create_project' => 'Nuovo Progetto',
    'edit_project' => 'Modifica Progetto',
    'project_details' => 'Dettagli Progetto',
    
    // Navigation
    'back_to_list' => 'Torna alla lista',
    'add_project' => 'Aggiungi Progetto',
    
    // Form labels - Tab 1: Info Base
    'name' => 'Nome Progetto',
    'client' => 'Cliente',
    'is_internal' => 'Progetto interno',
    'description' => 'Descrizione',
    'status' => 'Stato',
    'priority' => 'Priorità',
    
    // Form labels - Tab 2: Dev Links
    'dev_links' => 'Link Sviluppo',
    'repo_url' => 'Repository',
    'staging_url' => 'Staging',
    'production_url' => 'Produzione',
    'figma_url' => 'Figma',
    'docs_url' => 'Documentazione',
    
    // Form labels - Tab 3: Notes
    'notes' => 'Note',
    
    // Placeholders - Tab 1
    'placeholder' => [
        'name' => 'Es: E-commerce Acme S.r.l.',
        'client' => 'Cerca cliente...',
        'description' => 'Breve descrizione del progetto...',
        'notes' => 'Note e appunti generali sul progetto...',
        'repo_url' => 'https://github.com/username/repo',
        'staging_url' => 'https://staging.myapp.com',
        'production_url' => 'https://myapp.com',
        'figma_url' => 'https://figma.com/file/...',
        'docs_url' => 'https://docs.myapp.com',
    ],

    
    // Status options
    'status_draft' => 'Bozza',
    'status_in_progress' => 'In corso',
    'status_completed' => 'Completato',
    'status_archived' => 'Archiviato',
    
    // Priority options
    'priority_low' => 'Bassa',
    'priority_medium' => 'Media',
    'priority_high' => 'Alta',
    
    // Table headers
    'table' => [
        'name' => 'Nome',
        'client' => 'Cliente',
        'status' => 'Stato',
        'priority' => 'Priorità',
        'links' => 'Link',
        'created_at' => 'Creato il',
        'actions' => 'Azioni',
    ],
    
    // Internal project label
    'internal_project' => 'Progetto interno',
    'internal_project_desc' => 'Questo è un progetto interno. Non ci sono informazioni cliente associate.',
    
    // Buttons
    'save' => 'Salva Progetto',
    'filter' => 'Filtra',
    'cancel' => 'Annulla',
    'edit' => 'Modifica',
    'details' => 'Dettagli',
    'client_details' => 'Dettagli Cliente',
    'delete' => 'Elimina',
    'reset' => 'Reimposta', 
    'confirm_delete' => 'Sei sicuro di voler eliminare questo progetto?',
    
    // Messages
    'created_successfully' => 'Progetto creato con successo',
    'updated_successfully' => 'Progetto aggiornato con successo',
    'deleted_successfully' => 'Progetto eliminato con successo',
    'restored_successfully' => 'Progetto ripristinato con successo',
    'permanently_deleted' => 'Progetto eliminato definitivamente',
    
    // Empty state
    'no_projects' => 'Nessun progetto trovato',
    'no_projects_description' => 'Inizia creando il tuo primo progetto',
    'create_first_project' => 'Crea il primo progetto',
    
    // Filters
    'filter_by_client' => 'Filtra per cliente',
    'filter_by_status' => 'Filtra per stato',
    'filter_by_priority' => 'Filtra per priorità',
    'search_placeholder' => 'Cerca per nome, cliente o piva...',
    'all_clients' => 'Tutti i clienti',
    'all_statuses' => 'Tutti gli stati',
    'all_priorities' => 'Tutte le priorità',
    
    // Validation messages
    'validation' => [
        'name_required' => 'Il nome del progetto è obbligatorio',
        'status_required' => 'Lo stato è obbligatorio',
        'status_invalid' => 'Lo stato selezionato non è valido',
        'client_not_found' => 'Il cliente selezionato non esiste',
        'priority_invalid' => 'La priorità selezionata non è valida',
        'repo_url_invalid' => 'L\'URL del repository non è valido',
        'staging_url_invalid' => 'L\'URL di staging non è valido',
        'production_url_invalid' => 'L\'URL di produzione non è valido',
        'figma_url_invalid' => 'L\'URL di Figma non è valido',
        'docs_url_invalid' => 'L\'URL della documentazione non è valido',
    ],
    
    // Tabs
    'tab_info' => 'Info Base',
    'tab_links' => 'Dev Links',
    'tab_notes' => 'Note',
    
    // Quick links (icons tooltip)
    'open_repo' => 'Apri Repository',
    'open_staging' => 'Apri Staging',
    'open_production' => 'Apri Produzione',
    'open_figma' => 'Apri Figma',
    'open_docs' => 'Apri Documentazione',

    // Show page - Sidebar & Tabs
    'overview' => 'Panoramica',
    'quick_info' => 'Info Rapide',
    'quick_links' => 'Link Rapidi',
    'created_at' => 'Creato il',
    'updated_at' => 'Aggiornato il',

    // Empty states
    'no_description' => 'Nessuna descrizione',
    'no_notes' => 'Nessuna nota',
    'no_priority' => 'Nessuna priorità',
    'no_links' => 'Nessun link configurato',
    'no_links_configured' => 'Nessun link configurato',

    // Actions
    'open' => 'Apri',

    // Stats Cards
    'stats' => [
        'total' => 'Totale Progetti',
        'in_progress' => 'In Corso',
        'completed' => 'Completati',
        'archived' => 'Archiviati',
        'this_month' => 'questo mese',
        'this_week' => 'questa settimana',
        'of_total' => 'del totale',
    ],
    
];