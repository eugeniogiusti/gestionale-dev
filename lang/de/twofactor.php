<?php

return [
    // Form verifica al login
    'challenge_message' => 'Gib den Code aus deiner Authenticator-App oder einen Wiederherstellungscode ein.',
    'code_label' => 'Authentifizierungscode',
    'code_placeholder' => '123456',
    'remember_device' => 'Dieses Gerät merken',
    'verify_button' => 'Bestätigen',
    'invalid_code' => 'Ungültiger Code.',

    // Opzione codici di recupero
    'use_recovery_code' => 'Wiederherstellungscode verwenden',
    'use_authentication_code' => 'Authentifizierungscode verwenden',
    'recovery_code_label' => 'Wiederherstellungscode',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => 'Zwei-Faktor-Authentifizierung',
    'subtitle' => 'Füge deinem Konto eine zusätzliche Sicherheitsebene hinzu.',
    'enabled_since' => 'Aktiv seit :date',
    'disabled' => 'Die Zwei-Faktor-Authentifizierung ist derzeit nicht aktiv.',
    'enable_button' => '2FA aktivieren',
    'disable_button' => '2FA deaktivieren',
    'confirm_button' => 'Bestätigen',
    'cancel_setup' => 'Abbrechen',
    'password_label' => 'Passwort',
    'scan_qr' => 'Scanne diesen QR-Code mit deiner Authenticator-App (Google Authenticator, Authy, usw.)',
    'secret_help' => 'Oder gib diesen geheimen Code manuell ein:',
    'otp_label' => 'Bestätigungscode',
    
    // Recovery codes
    'recovery_codes_title' => 'Wiederherstellungscodes',
    'recovery_codes_help' => 'Bewahre diese Codes sicher auf. Du kannst sie verwenden, wenn du dein Gerät verlierst.',
    'recovery_codes_warning' => '⚠️ Speichere diese Codes jetzt! Sie werden nicht erneut angezeigt.',
    
    // Flash messages
    'flash_enabled' => 'Zwei-Faktor-Authentifizierung erfolgreich aktiviert!',
    'flash_disabled' => 'Zwei-Faktor-Authentifizierung deaktiviert.',
    'flash_pending' => 'Scanne den QR-Code und bestätige den Code.',
    'flash_already_enabled' => 'Zwei-Faktor-Authentifizierung ist bereits aktiv.',
    
    // Errors
    'errors' => [
        'no_pending_setup' => 'Kein 2FA-Setup in Arbeit.',
        'invalid_code' => 'Ungültiger Code.',
    ],


        // Gestione device fidati
    'trusted_devices' => [
        'title' => 'Vertrauenswürdige Geräte',
        'subtitle' => 'Verwalte die Geräte, von denen du dich mit 2FA angemeldet hast.',
        'manage_button' => 'Geräte verwalten',
        'no_devices' => 'Derzeit keine vertrauenswürdigen Geräte.',
        'current_device' => 'Dieses Gerät',
        'added_on' => 'Hinzugefügt am :date',
        'revoke_button' => 'Widerrufen',
        'revoke_all_button' => 'Alle Geräte widerrufen',
        'revoke_all_confirm' => 'Möchtest du wirklich alle vertrauenswürdigen Geräte widerrufen? Du musst beim nächsten Login den 2FA-Code eingeben.',
        'back_to_profile' => 'Zurück zum Profil',
    ],

    // Flash messages device
    'device_revoked' => 'Gerät erfolgreich widerrufen.',
    'all_devices_revoked' => 'Alle Geräte wurden widerrufen.',
    
];
