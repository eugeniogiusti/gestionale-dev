<?php

return [
    // Form verifica al login
    'challenge_message' => 'Wprowadź kod z aplikacji uwierzytelniającej lub kod odzyskiwania.',
    'code_label' => 'Kod uwierzytelniania',
    'code_placeholder' => '123456',
    'remember_device' => 'Zapamiętaj to urządzenie',
    'verify_button' => 'Zweryfikuj',
    'invalid_code' => 'Nieprawidłowy kod.',

    // Opzione codici di recupero
    'use_recovery_code' => 'Użyj kodu odzyskiwania',
    'use_authentication_code' => 'Użyj kodu uwierzytelniania',
    'recovery_code_label' => 'Kod odzyskiwania',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => 'Uwierzytelnianie dwuskładnikowe',
    'subtitle' => 'Dodaj dodatkową warstwę bezpieczeństwa do swojego konta.',
    'enabled_since' => 'Aktywne od :date',
    'disabled' => 'Uwierzytelnianie dwuskładnikowe nie jest obecnie aktywne.',
    'enable_button' => 'Włącz 2FA',
    'disable_button' => 'Wyłącz 2FA',
    'confirm_button' => 'Potwierdź',
    'cancel_setup' => 'Anuluj',
    'password_label' => 'Hasło',
    'scan_qr' => 'Zeskanuj ten kod QR w aplikacji uwierzytelniającej (Google Authenticator, Authy itp.)',
    'secret_help' => 'Lub wpisz ręcznie ten tajny kod:',
    'otp_label' => 'Kod weryfikacyjny',

    // Recovery codes
    'recovery_codes_title' => 'Kody odzyskiwania',
    'recovery_codes_help' => 'Zapisz te kody w bezpiecznym miejscu. Możesz ich użyć do logowania, jeśli utracisz urządzenie.',
    'recovery_codes_warning' => '⚠️ Zapisz te kody teraz! Nie będą już wyświetlane.',

    // Flash messages
    'flash_enabled' => 'Uwierzytelnianie dwuskładnikowe zostało włączone!',
    'flash_disabled' => 'Uwierzytelnianie dwuskładnikowe zostało wyłączone.',
    'flash_pending' => 'Zeskanuj kod QR i potwierdź kod.',
    'flash_already_enabled' => 'Uwierzytelnianie dwuskładnikowe jest już włączone.',

    // Errors
    'errors' => [
        'no_pending_setup' => 'Brak trwającej konfiguracji 2FA.',
        'invalid_code' => 'Nieprawidłowy kod.',
    ],


        // Gestione device fidati
    'trusted_devices' => [
        'title' => 'Zaufane urządzenia',
        'subtitle' => 'Zarządzaj urządzeniami, z których logowałeś się z 2FA.',
        'manage_button' => 'Zarządzaj urządzeniami',
        'no_devices' => 'Brak zaufanych urządzeń.',
        'current_device' => 'To urządzenie',
        'added_on' => 'Dodano :date',
        'revoke_button' => 'Unieważnij',
        'revoke_all_button' => 'Unieważnij wszystkie urządzenia',
        'revoke_all_confirm' => 'Czy na pewno chcesz unieważnić wszystkie zaufane urządzenia? Przy następnym logowaniu będziesz musiał ponownie wprowadzić kod 2FA.',
        'back_to_profile' => 'Powrót do profilu',
    ],

    // Flash messages device
    'device_revoked' => 'Urządzenie unieważnione pomyślnie.',
    'all_devices_revoked' => 'Wszystkie urządzenia zostały unieważnione.',

];
