<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Oversættelser af profilsiden
    |--------------------------------------------------------------------------
    |
    | Alle synlige tekster i brugerprofilen (information, adgangskode,
    | sletning af konto) oversat til dansk. Nøglerne følger
    | profile.<sektion>.<felt>.
    |
    */

    // Sektion: Profilinformation
    'info' => [
        'title'       => 'Profilinformation',
        'subtitle'    => 'Opdater dine konto-oplysninger og din emailadresse.',
        'name'        => 'Navn',
        'email'       => 'Email',
        'unverified'  => 'Din emailadresse er ikke bekræftet.',
        'resend'      => 'Klik her for at gensende bekræftelses-email.',
        'resent'      => 'Et nyt bekræftelseslink er sendt til din emailadresse.',
        'save'        => 'Gem',
        'saved'       => 'Gemt.',
    ],

    
        // Sektion: Sprog
    'locale' => [
        'title' => 'Sprog & lokalisering',
        'subtitle' => 'Vælg dit foretrukne sprog til grænsefladen.',
        'label' => 'Sprog',
    ],

    // Sektion: Opdater adgangskode
    'password' => [
        'title'       => 'Opdater adgangskode',
        'subtitle'    => 'Sørg for at bruge en lang og tilfældig adgangskode for at holde kontoen sikker.',
        'current'     => 'Nuværende adgangskode',
        'new'         => 'Ny adgangskode',
        'confirm'     => 'Bekræft adgangskode',
        'save'        => 'Opdater',
        'updated'     => 'Adgangskode opdateret.',

    ],

    // Sektion: Slet konto
    'delete' => [
        'title'            => 'Slet konto',
        'open_button'      => 'Slet konto',
        'lead'             => 'Når kontoen er slettet, vil alle ressourcer og data blive permanent fjernet. Inden du fortsætter, download de data du vil gemme.',
        'confirm_title'    => 'Er du sikker på, at du vil slette din konto?',
        'confirm_body'     => 'Når kontoen er slettet, vil alle ressourcer og data blive permanent fjernet. Indtast din adgangskode for at bekræfte den permanente sletning af din konto.',
        'password_label'   => 'Adgangskode',
        'cancel'           => 'Annuller',
        'confirm_button'   => 'Slet konto',
    ],

];
