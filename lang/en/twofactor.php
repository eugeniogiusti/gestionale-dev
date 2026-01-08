<?php

return [
    // Login verification form
    'challenge_message' => 'Enter the code from your authenticator app or a recovery code.',
    'code_label' => 'Authentication Code',
    'code_placeholder' => '123456',
    'remember_device' => 'Remember this device',
    'verify_button' => 'Verify',
    'invalid_code' => 'Invalid code.',

    // Profile section
    'title' => 'Two-Factor Authentication',
    'subtitle' => 'Add an extra layer of security to your account.',
    'enabled_since' => 'Enabled since :date',
    'disabled' => 'Two-factor authentication is not currently enabled.',
    'enable_button' => 'Enable 2FA',
    'disable_button' => 'Disable 2FA',
    'confirm_button' => 'Confirm',
    'cancel_setup' => 'Cancel',
    'password_label' => 'Password',
    'scan_qr' => 'Scan this QR code with your authenticator app (Google Authenticator, Authy, etc.)',
    'secret_help' => 'Or manually enter this secret key:',
    'otp_label' => 'Verification Code',
    
    // Recovery codes
    'recovery_codes_title' => 'Recovery Codes',
    'recovery_codes_help' => 'Save these codes in a safe place. You can use them to log in if you lose your device.',
    'recovery_codes_warning' => '⚠️ Save these codes now! They will not be shown again.',
    
    // Flash messages
    'flash_enabled' => 'Two-factor authentication successfully enabled!',
    'flash_disabled' => 'Two-factor authentication disabled.',
    'flash_pending' => 'Scan the QR code and confirm your verification code.',
    'flash_already_enabled' => 'Two-factor authentication is already enabled.',
    
    // Errors
    'errors' => [
        'no_pending_setup' => 'No 2FA setup in progress.',
        'invalid_code' => 'Invalid code.',
    ],

    // Trusted devices management
    'trusted_devices' => [
        'title' => 'Trusted Devices',
        'subtitle' => 'Manage the devices you have logged in from using 2FA.',
        'manage_button' => 'Manage Devices',
        'no_devices' => 'No trusted devices at the moment.',
        'current_device' => 'This device',
        'added_on' => 'Added on :date',
        'revoke_button' => 'Revoke',
        'revoke_all_button' => 'Revoke All Devices',
        'revoke_all_confirm' => 'Are you sure you want to revoke all trusted devices? You will need to re-enter your 2FA code on next login.',
        'back_to_profile' => 'Back to Profile',
    ],

    // Flash messages (devices)
    'device_revoked' => 'Device successfully revoked.',
    'all_devices_revoked' => 'All trusted devices have been revoked.',
];