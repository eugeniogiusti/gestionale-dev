<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Traductions Page Profil
    |--------------------------------------------------------------------------
    |
    | Tous les textes visibles dans la section profil utilisateur (informations, mot de passe,
    | suppression du compte) traduits en français. Les clés suivent le schéma
    | profile.<section>.<champ>.
    |
    */

    // Section : Informations profil
    'info' => [
        'title'       => 'Informations du profil',
        'subtitle'    => 'Mets à jour les informations de ton compte et l’adresse email.',
        'name'        => 'Nom',
        'email'       => 'Email',
        'unverified'  => 'Ton adresse email n’est pas vérifiée.',
        'resend'      => 'Clique ici pour renvoyer l’email de vérification.',
        'resent'      => 'Un nouveau lien de vérification a été envoyé à ton adresse email.',
        'save'        => 'Enregistrer',
        'saved'       => 'Enregistré.',
    ],

    
        // Section : Langue
    'locale' => [
        'title' => 'Langue & localisation',
        'subtitle' => 'Sélectionne ta langue préférée pour l’interface.',
        'label' => 'Langue',
    ],

    // Section : Mettre à jour le mot de passe
    'password' => [
        'title'       => 'Mettre à jour le mot de passe',
        'subtitle'    => 'Assure-toi d’utiliser un mot de passe long et aléatoire pour sécuriser ton compte.',
        'current'     => 'Mot de passe actuel',
        'new'         => 'Nouveau mot de passe',
        'confirm'     => 'Confirmer le mot de passe',
        'save'        => 'Mettre à jour',
        'updated'     => 'Mot de passe mis à jour.',

    ],

    // Section : Suppression du compte
    'delete' => [
        'title'            => 'Supprimer le compte',
        'open_button'      => 'Supprimer le compte',
        'lead'             => 'Une fois le compte supprimé, toutes les ressources et données seront définitivement effacées. Avant de continuer, télécharge les données que tu veux conserver.',
        'confirm_title'    => 'Es-tu sûr de vouloir supprimer ton compte ?',
        'confirm_body'     => 'Une fois le compte supprimé, toutes les ressources et données seront définitivement effacées. Saisis le mot de passe pour confirmer la suppression permanente de ton compte.',
        'password_label'   => 'Mot de passe',
        'cancel'           => 'Annuler',
        'confirm_button'   => 'Supprimer le compte',
    ],

];
