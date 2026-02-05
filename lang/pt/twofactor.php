<?php

return [
    // Form verifica al login
    'challenge_message' => 'Introduz o código da tua app de autenticação ou um código de recuperação.',
    'code_label' => 'Código de Autenticação',
    'code_placeholder' => '123456',
    'remember_device' => 'Lembrar este dispositivo',
    'verify_button' => 'Verificar',
    'invalid_code' => 'Código inválido.',

    // Opzione codici di recupero
    'use_recovery_code' => 'Usar um código de recuperação',
    'use_authentication_code' => 'Usar o código de autenticação',
    'recovery_code_label' => 'Código de Recuperação',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => 'Autenticação de Dois Fatores',
    'subtitle' => 'Adiciona um nível extra de segurança à tua conta.',
    'enabled_since' => 'Ativo desde :date',
    'disabled' => 'A autenticação de dois fatores não está atualmente ativa.',
    'enable_button' => 'Ativar 2FA',
    'disable_button' => 'Desativar 2FA',
    'confirm_button' => 'Confirmar',
    'cancel_setup' => 'Cancelar',
    'password_label' => 'Palavra‑passe',
    'scan_qr' => 'Digitaliza este QR code com a tua app de autenticação (Google Authenticator, Authy, etc.)',
    'secret_help' => 'Ou introduz manualmente este código secreto:',
    'otp_label' => 'Código de verificação',
    
    // Recovery codes
    'recovery_codes_title' => 'Códigos de Recuperação',
    'recovery_codes_help' => 'Guarda estes códigos num local seguro. Podes usá‑los para entrar se perderes o teu dispositivo.',
    'recovery_codes_warning' => '⚠️ Guarda estes códigos agora! Não serão mostrados novamente.',
    
    // Flash messages
    'flash_enabled' => 'Autenticação de dois fatores ativada com sucesso!',
    'flash_disabled' => 'Autenticação de dois fatores desativada.',
    'flash_pending' => 'Digitaliza o QR code e confirma o código.',
    'flash_already_enabled' => 'A autenticação de dois fatores já está ativa.',
    
    // Errors
    'errors' => [
        'no_pending_setup' => 'Nenhuma configuração 2FA em curso.',
        'invalid_code' => 'Código inválido.',
    ],


        // Gestione device fidati
    'trusted_devices' => [
        'title' => 'Dispositivos de Confiança',
        'subtitle' => 'Gere os dispositivos a partir dos quais iniciaste sessão com 2FA.',
        'manage_button' => 'Gerir Dispositivos',
        'no_devices' => 'Sem dispositivos de confiança de momento.',
        'current_device' => 'Este dispositivo',
        'added_on' => 'Adicionado em :date',
        'revoke_button' => 'Revogar',
        'revoke_all_button' => 'Revogar Todos os Dispositivos',
        'revoke_all_confirm' => 'Tens a certeza de que queres revogar todos os dispositivos de confiança? Terás de introduzir o código 2FA no próximo acesso.',
        'back_to_profile' => 'Voltar ao Perfil',
    ],

    // Flash messages device
    'device_revoked' => 'Dispositivo revogado com sucesso.',
    'all_devices_revoked' => 'Todos os dispositivos foram revogados.',
    
];
