<?php

return [
    // Form verifica al login
    'challenge_message' => 'Inserisci il codice dalla tua app di autenticazione o un codice di recupero.',
    'code_label' => 'Codice Autenticazione',
    'code_placeholder' => '123456',
    'remember_device' => 'Ricorda questo dispositivo',
    'verify_button' => 'Verifica',
    'invalid_code' => 'Codice non valido.',

    // Opzione codici di recupero
    'use_recovery_code' => 'Usa un codice di recupero',
    'use_authentication_code' => 'Usa il codice di autenticazione',
    'recovery_code_label' => 'Codice di Recupero',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => 'Autenticazione a Due Fattori',
    'subtitle' => 'Aggiungi un ulteriore livello di sicurezza al tuo account.',
    'enabled_since' => 'Attiva dal :date',
    'disabled' => 'L\'autenticazione a due fattori non è attualmente attiva.',
    'enable_button' => 'Attiva 2FA',
    'disable_button' => 'Disattiva 2FA',
    'confirm_button' => 'Conferma',
    'cancel_setup' => 'Annulla',
    'password_label' => 'Password',
    'scan_qr' => 'Scansiona questo QR code con la tua app di autenticazione (Google Authenticator, Authy, ecc.)',
    'secret_help' => 'Oppure inserisci manualmente questo codice segreto:',
    'otp_label' => 'Codice di verifica',
    
    // Recovery codes
    'recovery_codes_title' => 'Codici di Recupero',
    'recovery_codes_help' => 'Salva questi codici in un posto sicuro. Puoi usarli per accedere se perdi il tuo dispositivo.',
    'recovery_codes_warning' => '⚠️ Salva questi codici ora! Non verranno più mostrati.',
    
    // Flash messages
    'flash_enabled' => 'Autenticazione a due fattori attivata con successo!',
    'flash_disabled' => 'Autenticazione a due fattori disattivata.',
    'flash_pending' => 'Scansiona il QR code e conferma il codice.',
    'flash_already_enabled' => 'L\'autenticazione a due fattori è già attiva.',
    
    // Errors
    'errors' => [
        'no_pending_setup' => 'Nessun setup 2FA in corso.',
        'invalid_code' => 'Codice non valido.',
    ],


        // Gestione device fidati
    'trusted_devices' => [
        'title' => 'Dispositivi Fidati',
        'subtitle' => 'Gestisci i dispositivi da cui hai effettuato l\'accesso con 2FA.',
        'manage_button' => 'Gestisci Dispositivi',
        'no_devices' => 'Nessun dispositivo fidato al momento.',
        'current_device' => 'Questo dispositivo',
        'added_on' => 'Aggiunto il :date',
        'revoke_button' => 'Revoca',
        'revoke_all_button' => 'Revoca Tutti i Dispositivi',
        'revoke_all_confirm' => 'Sei sicuro di voler revocare tutti i dispositivi fidati? Dovrai reinserire il codice 2FA al prossimo accesso.',
        'back_to_profile' => 'Torna al Profilo',
    ],

    // Flash messages device
    'device_revoked' => 'Dispositivo revocato con successo.',
    'all_devices_revoked' => 'Tutti i dispositivi sono stati revocati.',
    
];