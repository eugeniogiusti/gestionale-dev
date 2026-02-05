<?php

return [
    // Form verifica al login
    'challenge_message' => 'Voer de code van je authenticatie-app in of een herstelcode.',
    'code_label' => 'Authenticatiecode',
    'code_placeholder' => '123456',
    'remember_device' => 'Dit apparaat onthouden',
    'verify_button' => 'Verifiëren',
    'invalid_code' => 'Ongeldige code.',

    // Opzione codici di recupero
    'use_recovery_code' => 'Herstelcode gebruiken',
    'use_authentication_code' => 'Authenticatiecode gebruiken',
    'recovery_code_label' => 'Herstelcode',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => 'Twee-factor-authenticatie',
    'subtitle' => 'Voeg een extra beveiligingslaag toe aan je account.',
    'enabled_since' => 'Actief sinds :date',
    'disabled' => 'Twee-factor-authenticatie is momenteel niet actief.',
    'enable_button' => '2FA inschakelen',
    'disable_button' => '2FA uitschakelen',
    'confirm_button' => 'Bevestigen',
    'cancel_setup' => 'Annuleren',
    'password_label' => 'Wachtwoord',
    'scan_qr' => 'Scan deze QR-code met je authenticatie-app (Google Authenticator, Authy, enz.)',
    'secret_help' => 'Of voer deze geheime code handmatig in:',
    'otp_label' => 'Verificatiecode',
    
    // Recovery codes
    'recovery_codes_title' => 'Herstelcodes',
    'recovery_codes_help' => 'Bewaar deze codes op een veilige plaats. Je kunt ze gebruiken als je je apparaat verliest.',
    'recovery_codes_warning' => '⚠️ Sla deze codes nu op! Ze worden niet opnieuw getoond.',
    
    // Flash messages
    'flash_enabled' => 'Twee-factor-authenticatie succesvol ingeschakeld!',
    'flash_disabled' => 'Twee-factor-authenticatie uitgeschakeld.',
    'flash_pending' => 'Scan de QR-code en bevestig de code.',
    'flash_already_enabled' => 'Twee-factor-authenticatie is al actief.',
    
    // Errors
    'errors' => [
        'no_pending_setup' => 'Geen 2FA-instelling bezig.',
        'invalid_code' => 'Ongeldige code.',
    ],


        // Gestione device fidati
    'trusted_devices' => [
        'title' => 'Vertrouwde apparaten',
        'subtitle' => 'Beheer de apparaten waarmee je bent ingelogd met 2FA.',
        'manage_button' => 'Apparaten beheren',
        'no_devices' => 'Geen vertrouwde apparaten op dit moment.',
        'current_device' => 'Dit apparaat',
        'added_on' => 'Toegevoegd op :date',
        'revoke_button' => 'Intrekken',
        'revoke_all_button' => 'Alle apparaten intrekken',
        'revoke_all_confirm' => 'Weet je zeker dat je alle vertrouwde apparaten wilt intrekken? Je moet de 2FA-code opnieuw invoeren bij de volgende login.',
        'back_to_profile' => 'Terug naar profiel',
    ],

    // Flash messages device
    'device_revoked' => 'Apparaat succesvol ingetrokken.',
    'all_devices_revoked' => 'Alle apparaten zijn ingetrokken.',
    
];
