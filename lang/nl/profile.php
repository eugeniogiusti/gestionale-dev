<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Vertalingen profielpagina
    |--------------------------------------------------------------------------
    |
    | Alle zichtbare teksten in het gebruikersprofiel (informatie, wachtwoord,
    | accountverwijdering) vertaald naar het Nederlands. De sleutels volgen
    | profile.<sectie>.<veld>.
    |
    */

    // Sectie: Profielinformatie
    'info' => [
        'title'       => 'Profielinformatie',
        'subtitle'    => 'Werk de gegevens van je account en je emailadres bij.',
        'name'        => 'Naam',
        'email'       => 'Email',
        'unverified'  => 'Je emailadres is niet geverifieerd.',
        'resend'      => 'Klik hier om de verificatiemail opnieuw te sturen.',
        'resent'      => 'Een nieuwe verificatielink is naar je emailadres gestuurd.',
        'save'        => 'Opslaan',
        'saved'       => 'Opgeslagen.',
    ],

    
        // Sectie: Taal
    'locale' => [
        'title' => 'Taal en lokalisatie',
        'subtitle' => 'Selecteer je voorkeurstaal voor de interface.',
        'label' => 'Taal',
    ],

    // Sectie: Wachtwoord bijwerken
    'password' => [
        'title'       => 'Wachtwoord bijwerken',
        'subtitle'    => 'Zorg voor een lang en willekeurig wachtwoord om je account veilig te houden.',
        'current'     => 'Huidig wachtwoord',
        'new'         => 'Nieuw wachtwoord',
        'confirm'     => 'Wachtwoord bevestigen',
        'save'        => 'Bijwerken',
        'updated'     => 'Wachtwoord bijgewerkt.',

    ],

    // Sectie: Account verwijderen
    'delete' => [
        'title'            => 'Account verwijderen',
        'open_button'      => 'Account verwijderen',
        'lead'             => 'Zodra het account is verwijderd, worden alle resources en gegevens definitief verwijderd. Download eerst de gegevens die je wilt bewaren.',
        'confirm_title'    => 'Weet je zeker dat je je account wilt verwijderen?',
        'confirm_body'     => 'Zodra het account is verwijderd, worden alle resources en gegevens definitief verwijderd. Voer je wachtwoord in om de permanente verwijdering te bevestigen.',
        'password_label'   => 'Wachtwoord',
        'cancel'           => 'Annuleren',
        'confirm_button'   => 'Account verwijderen',
    ],

];
