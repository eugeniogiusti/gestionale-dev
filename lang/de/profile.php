<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Übersetzungen Profilseite
    |--------------------------------------------------------------------------
    |
    | Alle sichtbaren Texte im Benutzerprofil (Informationen, Passwort,
    | Kontolöschung) auf Deutsch. Die Keys folgen dem Schema
    | profile.<bereich>.<feld>.
    |
    */

    // Bereich: Profilinformationen
    'info' => [
        'title'       => 'Profilinformationen',
        'subtitle'    => 'Aktualisiere deine Kontoinformationen und E-Mail-Adresse.',
        'name'        => 'Name',
        'email'       => 'E-Mail',
        'unverified'  => 'Deine E-Mail-Adresse ist nicht verifiziert.',
        'resend'      => 'Klicke hier, um die Bestätigungs-E-Mail erneut zu senden.',
        'resent'      => 'Ein neuer Bestätigungslink wurde an deine E-Mail-Adresse gesendet.',
        'save'        => 'Speichern',
        'saved'       => 'Gespeichert.',
    ],

    
        // Bereich: Sprache
    'locale' => [
        'title' => 'Sprache & Lokalisierung',
        'subtitle' => 'Wähle deine bevorzugte Sprache für die Oberfläche.',
        'label' => 'Sprache',
    ],

    // Bereich: Passwort aktualisieren
    'password' => [
        'title'       => 'Passwort aktualisieren',
        'subtitle'    => 'Nutze ein langes, zufälliges Passwort, um dein Konto zu schützen.',
        'current'     => 'Aktuelles Passwort',
        'new'         => 'Neues Passwort',
        'confirm'     => 'Passwort bestätigen',
        'save'        => 'Aktualisieren',
        'updated'     => 'Passwort aktualisiert.',

    ],

    // Bereich: Konto löschen
    'delete' => [
        'title'            => 'Konto löschen',
        'open_button'      => 'Konto löschen',
        'lead'             => 'Nach dem Löschen deines Kontos werden alle Ressourcen und Daten dauerhaft entfernt. Lade vorher alle Daten herunter, die du behalten möchtest.',
        'confirm_title'    => 'Möchtest du dein Konto wirklich löschen?',
        'confirm_body'     => 'Nach dem Löschen deines Kontos werden alle Ressourcen und Daten dauerhaft entfernt. Gib dein Passwort ein, um die endgültige Löschung zu bestätigen.',
        'password_label'   => 'Passwort',
        'cancel'           => 'Abbrechen',
        'confirm_button'   => 'Konto löschen',
    ],

];
