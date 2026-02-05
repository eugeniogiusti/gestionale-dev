<?php

return [
    // Form verifica al login
    'challenge_message' => 'Введіть код з вашого застосунку автентифікації або код відновлення.',
    'code_label' => 'Код автентифікації',
    'code_placeholder' => '123456',
    'remember_device' => 'Запамʼятати цей пристрій',
    'verify_button' => 'Перевірити',
    'invalid_code' => 'Невірний код.',

    // Opzione codici di recupero
    'use_recovery_code' => 'Використати код відновлення',
    'use_authentication_code' => 'Використати код автентифікації',
    'recovery_code_label' => 'Код відновлення',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => 'Двофакторна автентифікація',
    'subtitle' => 'Додайте додатковий рівень безпеки для вашого облікового запису.',
    'enabled_since' => 'Активно з :date',
    'disabled' => 'Двофакторна автентифікація наразі не активна.',
    'enable_button' => 'Увімкнути 2FA',
    'disable_button' => 'Вимкнути 2FA',
    'confirm_button' => 'Підтвердити',
    'cancel_setup' => 'Скасувати',
    'password_label' => 'Пароль',
    'scan_qr' => 'Відскануйте цей QR-код у вашому застосунку автентифікації (Google Authenticator, Authy тощо)',
    'secret_help' => 'Або введіть вручну цей секретний код:',
    'otp_label' => 'Код підтвердження',

    // Recovery codes
    'recovery_codes_title' => 'Коди відновлення',
    'recovery_codes_help' => 'Збережіть ці коди у безпечному місці. Ви можете використати їх для входу, якщо втратите пристрій.',
    'recovery_codes_warning' => '⚠️ Збережіть ці коди зараз! Вони більше не будуть показані.',

    // Flash messages
    'flash_enabled' => 'Двофакторну автентифікацію успішно увімкнено!',
    'flash_disabled' => 'Двофакторну автентифікацію вимкнено.',
    'flash_pending' => 'Відскануйте QR-код і підтвердьте код.',
    'flash_already_enabled' => 'Двофакторна автентифікація вже активна.',

    // Errors
    'errors' => [
        'no_pending_setup' => 'Немає активного налаштування 2FA.',
        'invalid_code' => 'Невірний код.',
    ],


        // Gestione device fidati
    'trusted_devices' => [
        'title' => 'Довірені пристрої',
        'subtitle' => 'Керуйте пристроями, з яких ви входили з 2FA.',
        'manage_button' => 'Керувати пристроями',
        'no_devices' => 'Немає довірених пристроїв.',
        'current_device' => 'Цей пристрій',
        'added_on' => 'Додано :date',
        'revoke_button' => 'Відкликати',
        'revoke_all_button' => 'Відкликати всі пристрої',
        'revoke_all_confirm' => 'Ви впевнені, що хочете відкликати всі довірені пристрої? Наступного входу потрібно буде знову вводити код 2FA.',
        'back_to_profile' => 'Повернутися до профілю',
    ],

    // Flash messages device
    'device_revoked' => 'Пристрій успішно відкликано.',
    'all_devices_revoked' => 'Усі пристрої відкликано.',

];
