<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Traduzioni Pagina Profilo
    |--------------------------------------------------------------------------
    |
    | Tutti i testi visibili nella sezione profilo utente (informazioni, password,
    | eliminazione account) tradotti in italiano. Le chiavi seguono lo schema
    | profile.<sezione>.<campo>.
    |
    */

    // Sezione: Informazioni profilo
    'info' => [
        'title'       => 'Informazioni profilo',
        'subtitle'    => 'Aggiorna le informazioni del tuo account e l’indirizzo email.',
        'name'        => 'Nome',
        'email'       => 'Email',
        'unverified'  => 'Il tuo indirizzo email non è verificato.',
        'resend'      => 'Clicca qui per reinviare l’email di verifica.',
        'resent'      => 'Un nuovo link di verifica è stato inviato al tuo indirizzo email.',
        'save'        => 'Salva',
        'saved'       => 'Salvato.',
    ],

    
        // Sezione: Lingua
    'locale' => [
        'title' => 'Lingua & Localizzazione',
        'subtitle' => 'Seleziona la tua lingua preferita per l\'interfaccia.',
        'label' => 'Lingua',
    ],

    // Sezione: Aggiorna password
    'password' => [
        'title'       => 'Aggiorna password',
        'subtitle'    => 'Assicurati di usare una password lunga e casuale per mantenere sicuro l’account.',
        'current'     => 'Password attuale',
        'new'         => 'Nuova password',
        'confirm'     => 'Conferma password',
        'save'        => 'Aggiorna',
        'updated'     => 'Password aggiornata.',

    ],

    // Sezione: Eliminazione account
    'delete' => [
        'title'            => 'Elimina account',
        'open_button'      => 'Elimina account',
        'lead'             => 'Una volta eliminato l’account, tutte le risorse e i dati saranno cancellati definitivamente. Prima di procedere, scarica i dati che vuoi conservare.',
        'confirm_title'    => 'Sei sicuro di voler eliminare il tuo account?',
        'confirm_body'     => 'Una volta eliminato l’account, tutte le risorse e i dati saranno cancellati definitivamente. Inserisci la password per confermare l’eliminazione permanente del tuo account.',
        'password_label'   => 'Password',
        'cancel'           => 'Annulla',
        'confirm_button'   => 'Elimina account',
    ],

];