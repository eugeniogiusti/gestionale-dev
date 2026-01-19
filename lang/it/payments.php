<?php

return [
    'title' => 'Pagamenti',
    'subtitle' => 'Traccia i pagamenti ricevuti dai clienti',
    'payment_list' => 'Lista Pagamenti',
    'create_payment' => 'Crea Pagamento',
    'edit_payment' => 'Modifica Pagamento',
    'add_payment' => 'Aggiungi Pagamento',
    'view_all' => 'Vedi Tutti i Pagamenti',
    'view_project' => 'Vedi Progetto',
    'no_payments' => 'Nessun pagamento',
    'no_payments_description' => 'Registra il tuo primo pagamento per questo progetto',
    'confirm_delete' => 'Sei sicuro di voler eliminare questo pagamento?',
    'recent' => 'Recente',
    
    'project' => 'Progetto',
    'amount' => 'Importo',
    'currency' => 'Valuta',
    'paid_at' => 'Pagato il',
    'due_date' => 'Scadenza',
    'due' => 'Scadenza',
    'method' => 'Metodo di Pagamento',
    'reference' => 'Riferimento',
    'notes' => 'Note',
    'invoice' => 'Fattura',

    'all_methods' => 'Tutti i Metodi',
    'all_currencies' => 'Tutte le Valute',
    
    'method_cash' => 'Contanti',
    'method_bank' => 'Bonifico Bancario',
    'method_stripe' => 'Stripe',
    'method_paypal' => 'PayPal',

    'created_successfully' => 'Pagamento creato con successo',
    'updated_successfully' => 'Pagamento aggiornato con successo',
    'deleted_successfully' => 'Pagamento eliminato con successo',

    'stats' => [
        'total_all_time' => 'Totale Storico',
        'all_projects' => 'Tutti i progetti',
        'this_month' => 'Questo Mese',
        'this_year' => 'Quest\'Anno',
        'currencies' => 'Valute',
    ],

    'placeholder' => [
        'search' => 'Cerca per riferimento o note...',
        'amount' => 'es., 1500.00',
        'reference' => 'es., Fattura #2024-001, Stripe ch_xxx',
        'notes' => 'Note aggiuntive...',
        'due_date' => 'es., 2025-02-15',
    ],

    'amount_required' => 'L\'importo è obbligatorio',
    'amount_min' => 'L\'importo deve essere almeno 0.01',
    'paid_at_required' => 'La data di pagamento è obbligatoria',
    'due_date_invalid' => 'La scadenza deve essere uguale o successiva alla data di pagamento',
    'method_required' => 'Il metodo di pagamento è obbligatorio',
    'currency_invalid' => 'Valuta non valida',
    'due_date_help' => 'Opzionale: Data di scadenza del pagamento per la fattura',
    'notes_help' => 'Questa descrizione verrà usata nella fattura',
];