<?php

return [
    // Form verifica al login
    'challenge_message' => 'Saisis le code de ton application d’authentification ou un code de récupération.',
    'code_label' => 'Code d’authentification',
    'code_placeholder' => '123456',
    'remember_device' => 'Se souvenir de cet appareil',
    'verify_button' => 'Vérifier',
    'invalid_code' => 'Code invalide.',

    // Opzione codici di recupero
    'use_recovery_code' => 'Utiliser un code de récupération',
    'use_authentication_code' => 'Utiliser le code d’authentification',
    'recovery_code_label' => 'Code de récupération',
    'recovery_code_placeholder' => 'XXXXXXXXXX',

    // Sezione profilo
    'title' => 'Authentification à deux facteurs',
    'subtitle' => 'Ajoute une couche de sécurité supplémentaire à ton compte.',
    'enabled_since' => 'Active depuis le :date',
    'disabled' => 'L’authentification à deux facteurs n’est pas active actuellement.',
    'enable_button' => 'Activer 2FA',
    'disable_button' => 'Désactiver 2FA',
    'confirm_button' => 'Confirmer',
    'cancel_setup' => 'Annuler',
    'password_label' => 'Mot de passe',
    'scan_qr' => 'Scanne ce QR code avec ton appli d’authentification (Google Authenticator, Authy, etc.)',
    'secret_help' => 'Ou saisis manuellement ce code secret :',
    'otp_label' => 'Code de vérification',
    
    // Recovery codes
    'recovery_codes_title' => 'Codes de récupération',
    'recovery_codes_help' => 'Garde ces codes dans un endroit sûr. Tu peux les utiliser pour accéder si tu perds ton appareil.',
    'recovery_codes_warning' => '⚠️ Enregistre ces codes maintenant ! Ils ne seront plus affichés.',
    
    // Flash messages
    'flash_enabled' => 'Authentification à deux facteurs activée avec succès !',
    'flash_disabled' => 'Authentification à deux facteurs désactivée.',
    'flash_pending' => 'Scanne le QR code et confirme le code.',
    'flash_already_enabled' => 'L’authentification à deux facteurs est déjà active.',
    
    // Errors
    'errors' => [
        'no_pending_setup' => 'Aucune configuration 2FA en cours.',
        'invalid_code' => 'Code invalide.',
    ],


        // Gestione device fidati
    'trusted_devices' => [
        'title' => 'Appareils de confiance',
        'subtitle' => 'Gère les appareils depuis lesquels tu t’es connecté avec 2FA.',
        'manage_button' => 'Gérer les appareils',
        'no_devices' => 'Aucun appareil de confiance pour le moment.',
        'current_device' => 'Cet appareil',
        'added_on' => 'Ajouté le :date',
        'revoke_button' => 'Révoquer',
        'revoke_all_button' => 'Révoquer tous les appareils',
        'revoke_all_confirm' => 'Es-tu sûr de vouloir révoquer tous les appareils de confiance ? Tu devras saisir le code 2FA lors de la prochaine connexion.',
        'back_to_profile' => 'Retour au profil',
    ],

    // Flash messages device
    'device_revoked' => 'Appareil révoqué avec succès.',
    'all_devices_revoked' => 'Tous les appareils ont été révoqués.',
    
];
