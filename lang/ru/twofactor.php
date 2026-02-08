<?php

return [
    // Login challenge form
    'challenge_message' => 'Введите код из приложения-аутентификатора или резервный код.',
    'code_label' => 'Код аутентификации',
    'code_placeholder' => '123456',
    'remember_device' => 'Запомнить это устройство',
    'verify_button' => 'Проверить',
    'invalid_code' => 'Неверный код.',

    // Recovery code option
    'use_recovery_code' => 'Использовать резервный код',
    'use_authentication_code' => 'Использовать код аутентификации',
    'recovery_code_label' => 'Резервный код',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Profile section
    'title' => 'Двухфакторная аутентификация',
    'subtitle' => 'Добавьте дополнительный уровень безопасности для аккаунта.',
    'enabled_since' => 'Включено с :date',
    'disabled' => 'Двухфакторная аутентификация сейчас выключена.',
    'enable_button' => 'Включить 2FA',
    'disable_button' => 'Выключить 2FA',
    'confirm_button' => 'Подтвердить',
    'cancel_setup' => 'Отмена',
    'password_label' => 'Пароль',
    'scan_qr' => 'Отсканируйте этот QR-код приложением-аутентификатором (Google Authenticator, Authy и т.д.)',
    'secret_help' => 'Или введите этот секретный ключ вручную:',
    'otp_label' => 'Код подтверждения',

    // Recovery codes
    'recovery_codes_title' => 'Резервные коды',
    'recovery_codes_help' => 'Сохраните эти коды в безопасном месте. Используйте их, если потеряете устройство.',
    'recovery_codes_warning' => 'Сохраните эти коды сейчас! Больше они показаны не будут.',

    // Flash messages
    'flash_enabled' => 'Двухфакторная аутентификация успешно включена!',
    'flash_disabled' => 'Двухфакторная аутентификация выключена.',
    'flash_pending' => 'Отсканируйте QR-код и подтвердите код.',
    'flash_already_enabled' => 'Двухфакторная аутентификация уже включена.',

    // Errors
    'errors' => [
        'no_pending_setup' => 'Нет активной настройки 2FA.',
        'invalid_code' => 'Неверный код.',
    ],

    // Trusted devices management
    'trusted_devices' => [
        'title' => 'Доверенные устройства',
        'subtitle' => 'Управляйте устройствами, где вы входили с 2FA.',
        'manage_button' => 'Управлять устройствами',
        'no_devices' => 'Сейчас нет доверенных устройств.',
        'current_device' => 'Это устройство',
        'added_on' => 'Добавлено :date',
        'revoke_button' => 'Отозвать',
        'revoke_all_button' => 'Отозвать все устройства',
        'revoke_all_confirm' => 'Вы уверены, что хотите отозвать все доверенные устройства? При следующем входе потребуется код 2FA.',
        'back_to_profile' => 'Назад к профилю',
    ],

    // Device flash messages
    'device_revoked' => 'Устройство успешно отозвано.',
    'all_devices_revoked' => 'Все устройства отозваны.',
];
