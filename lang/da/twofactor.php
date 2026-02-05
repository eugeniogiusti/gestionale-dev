<?php

return [
    // Form verifica al login
    'challenge_message' => 'Indtast koden fra din godkendelsesapp eller en gendannelseskode.',
    'code_label' => 'Godkendelseskode',
    'code_placeholder' => '123456',
    'remember_device' => 'Husk denne enhed',
    'verify_button' => 'Bekræft',
    'invalid_code' => 'Ugyldig kode.',

    // Opzione codici di recupero
    'use_recovery_code' => 'Brug en gendannelseskode',
    'use_authentication_code' => 'Brug godkendelseskode',
    'recovery_code_label' => 'Gendannelseskode',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => 'To-faktor-autentificering',
    'subtitle' => 'Tilføj et ekstra sikkerhedslag til din konto.',
    'enabled_since' => 'Aktiv siden :date',
    'disabled' => 'To-faktor-autentificering er ikke aktiv i øjeblikket.',
    'enable_button' => 'Aktivér 2FA',
    'disable_button' => 'Deaktivér 2FA',
    'confirm_button' => 'Bekræft',
    'cancel_setup' => 'Annuller',
    'password_label' => 'Adgangskode',
    'scan_qr' => 'Scan denne QR-kode med din godkendelsesapp (Google Authenticator, Authy, osv.)',
    'secret_help' => 'Eller indtast denne hemmelige kode manuelt:',
    'otp_label' => 'Bekræftelseskode',
    
    // Recovery codes
    'recovery_codes_title' => 'Gendannelseskoder',
    'recovery_codes_help' => 'Gem disse koder et sikkert sted. Du kan bruge dem til at logge ind, hvis du mister din enhed.',
    'recovery_codes_warning' => '⚠️ Gem disse koder nu! De vises ikke igen.',
    
    // Flash messages
    'flash_enabled' => 'To-faktor-autentificering aktiveret!',
    'flash_disabled' => 'To-faktor-autentificering deaktiveret.',
    'flash_pending' => 'Scan QR-koden og bekræft koden.',
    'flash_already_enabled' => 'To-faktor-autentificering er allerede aktiv.',
    
    // Errors
    'errors' => [
        'no_pending_setup' => 'Ingen 2FA-opsætning i gang.',
        'invalid_code' => 'Ugyldig kode.',
    ],


        // Gestione device fidati
    'trusted_devices' => [
        'title' => 'Betroede enheder',
        'subtitle' => 'Administrér de enheder, hvor du har logget ind med 2FA.',
        'manage_button' => 'Administrér enheder',
        'no_devices' => 'Ingen betroede enheder i øjeblikket.',
        'current_device' => 'Denne enhed',
        'added_on' => 'Tilføjet den :date',
        'revoke_button' => 'Tilbagekald',
        'revoke_all_button' => 'Tilbagekald alle enheder',
        'revoke_all_confirm' => 'Er du sikker på, at du vil tilbagekalde alle betroede enheder? Du skal indtaste 2FA-koden ved næste login.',
        'back_to_profile' => 'Tilbage til profil',
    ],

    // Flash messages device
    'device_revoked' => 'Enhed tilbagekaldt.',
    'all_devices_revoked' => 'Alle enheder er tilbagekaldt.',
    
];
