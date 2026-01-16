<?php

return [
    // Login challenge form
    'challenge_message' => 'Please enter the code from your authenticator app or a recovery code.',
    'code_label' => 'Authentication Code',
    'code_placeholder' => '123456',
    'remember_device' => 'Remember this device',
    'verify_button' => 'Verify',
    'invalid_code' => 'Invalid code.',

    // Recovery code options
    'use_recovery_code' => 'Use a recovery code',
    'use_authentication_code' => 'Use an authentication code',
    'recovery_code_label' => 'Recovery Code',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Profile section
    'title' => 'Two-Factor Authentication',
    'subtitle' => 'Add an extra layer of security to your account.',
    'enabled_since' => 'Enabled since :date',
    'disabled' => 'Two-factor authentication is currently disabled.',
    'enable_button' => 'Enable 2FA',
    'disable_button' => 'Disable 2FA',
    'confirm_button' => 'Confirm',
    'cancel_setup' => 'Cancel',
    'password_label' => 'Password',
    'scan_qr' => 'Scan this QR code with your authenticator app (Google Authenticator, Authy, etc.)',
    'secret_help' => 'Or manually enter this secret key:',
    'otp_label' => 'Verification code',
    
    // Recovery codes
    'recovery_codes_title' => 'Recovery Codes',
    'recovery_codes_help' => 'Store these codes in a secure place. You can use them to log in if you lose your device.',
    'recovery_codes_warning' => '⚠️ Save these codes now! They will not be shown again.',
    
    // Flash messages
    'flash_enabled' => 'Two-factor authentication enabled successfully!',
    'flash_disabled' => 'Two-factor authentication disabled.',
    'flash_pending' => 'Please scan the QR code and confirm the verification code.',
    'flash_already_enabled' => 'Two-factor authentication is already enabled.',
    
    // Errors
    'errors' => [
        'no_pending_setup' => 'No 2FA setup in progress.',
        'invalid_code' => 'The provided code was invalid.',
    ],

    // Trusted devices management
    'trusted_devices' => [
        'title' => 'Trusted Devices',
        'subtitle' => 'Manage the devices from which you have logged in using 2FA.',
        'manage_button' => 'Manage Devices',
        'no_devices' => 'No trusted devices at the moment.',
        'current_device' => 'This device',
        'added_on' => 'Added on :date',
        'revoke_button' => 'Revoke',
        'revoke_all_button' => 'Revoke All Devices',
        'revoke_all_confirm' => 'Are you sure you want to revoke all trusted devices? You will need to re-enter your 2FA code on your next login.',
        'back_to_profile' => 'Back to Profile',
    ],

    // Device flash messages
    'device_revoked' => 'Device revoked successfully.',
    'all_devices_revoked' => 'All devices have been revoked.',
    
];