<?php

return [
    // Form verifica al login
    'challenge_message' => 'Introduce el código de tu app de autenticación o un código de recuperación.',
    'code_label' => 'Código de autenticación',
    'code_placeholder' => '123456',
    'remember_device' => 'Recordar este dispositivo',
    'verify_button' => 'Verificar',
    'invalid_code' => 'Código no válido.',

    // Opzione codici di recupero
    'use_recovery_code' => 'Usar un código de recuperación',
    'use_authentication_code' => 'Usar el código de autenticación',
    'recovery_code_label' => 'Código de recuperación',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => 'Autenticación de dos factores',
    'subtitle' => 'Añade una capa extra de seguridad a tu cuenta.',
    'enabled_since' => 'Activa desde :date',
    'disabled' => 'La autenticación de dos factores no está activa actualmente.',
    'enable_button' => 'Activar 2FA',
    'disable_button' => 'Desactivar 2FA',
    'confirm_button' => 'Confirmar',
    'cancel_setup' => 'Cancelar',
    'password_label' => 'Contraseña',
    'scan_qr' => 'Escanea este QR con tu app de autenticación (Google Authenticator, Authy, etc.)',
    'secret_help' => 'O introduce manualmente este código secreto:',
    'otp_label' => 'Código de verificación',
    
    // Recovery codes
    'recovery_codes_title' => 'Códigos de recuperación',
    'recovery_codes_help' => 'Guarda estos códigos en un lugar seguro. Puedes usarlos para acceder si pierdes tu dispositivo.',
    'recovery_codes_warning' => '⚠️ Guarda estos códigos ahora. No se volverán a mostrar.',
    
    // Flash messages
    'flash_enabled' => '¡Autenticación de dos factores activada correctamente!',
    'flash_disabled' => 'Autenticación de dos factores desactivada.',
    'flash_pending' => 'Escanea el QR y confirma el código.',
    'flash_already_enabled' => 'La autenticación de dos factores ya está activa.',
    
    // Errors
    'errors' => [
        'no_pending_setup' => 'No hay una configuración de 2FA en curso.',
        'invalid_code' => 'Código no válido.',
    ],


        // Gestione device fidati
    'trusted_devices' => [
        'title' => 'Dispositivos de confianza',
        'subtitle' => 'Gestiona los dispositivos desde los que has iniciado sesión con 2FA.',
        'manage_button' => 'Gestionar dispositivos',
        'no_devices' => 'No hay dispositivos de confianza por ahora.',
        'current_device' => 'Este dispositivo',
        'added_on' => 'Añadido el :date',
        'revoke_button' => 'Revocar',
        'revoke_all_button' => 'Revocar todos los dispositivos',
        'revoke_all_confirm' => '¿Seguro que quieres revocar todos los dispositivos de confianza? Deberás introducir el código 2FA en el próximo acceso.',
        'back_to_profile' => 'Volver al perfil',
    ],

    // Flash messages device
    'device_revoked' => 'Dispositivo revocado correctamente.',
    'all_devices_revoked' => 'Todos los dispositivos han sido revocados.',
    
];
