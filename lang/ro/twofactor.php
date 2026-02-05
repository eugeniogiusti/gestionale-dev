<?php

return [
    // Form verifica al login
    'challenge_message' => 'Introdu codul din aplicația ta de autentificare sau un cod de recuperare.',
    'code_label' => 'Cod de autentificare',
    'code_placeholder' => '123456',
    'remember_device' => 'Ține minte acest dispozitiv',
    'verify_button' => 'Verifică',
    'invalid_code' => 'Cod invalid.',

    // Opzione codici di recupero
    'use_recovery_code' => 'Folosește un cod de recuperare',
    'use_authentication_code' => 'Folosește codul de autentificare',
    'recovery_code_label' => 'Cod de recuperare',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => 'Autentificare cu doi factori',
    'subtitle' => 'Adaugă un nivel suplimentar de securitate contului tău.',
    'enabled_since' => 'Activă din :date',
    'disabled' => 'Autentificarea cu doi factori nu este activă în prezent.',
    'enable_button' => 'Activează 2FA',
    'disable_button' => 'Dezactivează 2FA',
    'confirm_button' => 'Confirmă',
    'cancel_setup' => 'Anulează',
    'password_label' => 'Parolă',
    'scan_qr' => 'Scanează acest cod QR cu aplicația ta de autentificare (Google Authenticator, Authy etc.)',
    'secret_help' => 'Sau introdu manual acest cod secret:',
    'otp_label' => 'Cod de verificare',

    // Recovery codes
    'recovery_codes_title' => 'Coduri de recuperare',
    'recovery_codes_help' => 'Salvează aceste coduri într-un loc sigur. Le poți folosi pentru a accesa contul dacă îți pierzi dispozitivul.',
    'recovery_codes_warning' => '⚠️ Salvează aceste coduri acum! Nu vor mai fi afișate.',

    // Flash messages
    'flash_enabled' => 'Autentificarea cu doi factori a fost activată cu succes!',
    'flash_disabled' => 'Autentificarea cu doi factori a fost dezactivată.',
    'flash_pending' => 'Scanează codul QR și confirmă codul.',
    'flash_already_enabled' => 'Autentificarea cu doi factori este deja activă.',

    // Errors
    'errors' => [
        'no_pending_setup' => 'Nu există nicio configurare 2FA în curs.',
        'invalid_code' => 'Cod invalid.',
    ],


        // Gestione device fidati
    'trusted_devices' => [
        'title' => 'Dispozitive de încredere',
        'subtitle' => 'Gestionează dispozitivele de pe care te-ai autentificat cu 2FA.',
        'manage_button' => 'Gestionează dispozitivele',
        'no_devices' => 'Niciun dispozitiv de încredere în acest moment.',
        'current_device' => 'Acest dispozitiv',
        'added_on' => 'Adăugat la :date',
        'revoke_button' => 'Revocă',
        'revoke_all_button' => 'Revocă toate dispozitivele',
        'revoke_all_confirm' => 'Ești sigur că vrei să revoci toate dispozitivele de încredere? Va trebui să introduci codul 2FA la următoarea autentificare.',
        'back_to_profile' => 'Înapoi la profil',
    ],

    // Flash messages device
    'device_revoked' => 'Dispozitiv revocat cu succes.',
    'all_devices_revoked' => 'Toate dispozitivele au fost revocate.',

];
