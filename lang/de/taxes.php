<?php

return [
    'title'       => 'Steuern',
    'subtitle'    => 'Steuerzahlungen und Dokumente verwalten',
    'create_tax'  => 'Steuer hinzufügen',
    'edit_tax'    => 'Steuer bearbeiten',
    'no_taxes'    => 'Noch keine Steuern',
    'no_taxes_description' => 'Erste Steuerzahlung erfassen',
    'confirm_delete' => 'Diese Steuer wirklich löschen?',

    'description'    => 'Beschreibung',
    'amount'         => 'Betrag',
    'due_date'       => 'Fälligkeitsdatum',
    'paid_at'        => 'Bezahlt am',
    'reference_year' => 'Referenzjahr',
    'attachment'     => 'Steuerdokument',
    'notes'          => 'Notizen',

    'all_years'    => 'Alle Jahre',
    'all_statuses' => 'Alle',
    'paid'         => 'Bezahlt',
    'unpaid'       => 'Ausstehend',

    'created_successfully' => 'Steuer erfolgreich erstellt',
    'updated_successfully' => 'Steuer erfolgreich aktualisiert',
    'deleted_successfully' => 'Steuer erfolgreich gelöscht',

    'attachment_uploaded_successfully' => 'Dokument erfolgreich hochgeladen',
    'attachment_deleted_successfully'  => 'Dokument erfolgreich gelöscht',
    'attachment_not_found'             => 'Dokument nicht gefunden',
    'attachment_required'              => 'Datei ist erforderlich',
    'attachment_mimes'                 => 'Nur PDF, JPG, JPEG, PNG-Dateien sind erlaubt',
    'attachment_max'                   => 'Dateigröße darf 10 MB nicht überschreiten',

    'stats' => [
        'total_all_time'  => 'Gesamt aller Zeiten',
        'total_this_year' => 'Dieses Jahr',
        'unpaid_amount'   => 'Ausstehend',
        'count_this_year' => 'Steuern dieses Jahr',
        'paid_total'      => 'Bezahlter Betrag',
        'due'             => 'Fälliger Betrag',
        'scheduled'       => 'Geplant',
    ],

    'placeholder' => [
        'search'         => 'Nach Beschreibung suchen...',
        'amount'         => 'z.B. 1500.00',
        'description'    => 'z.B. Einkommensteuer 2025',
        'reference_year' => 'z.B. 2025',
        'notes'          => 'Zusätzliche Notizen...',
    ],

    'calendar_title'       => 'Steuer fällig :due_date – :description (:year)',
    'calendar_description' => 'Steuerzahlung fällig',
    'add_to_calendar'      => 'Zu Google Kalender hinzufügen',

    'description_required'    => 'Beschreibung ist erforderlich',
    'amount_required'         => 'Betrag ist erforderlich',
    'amount_min'              => 'Betrag muss mindestens 0,01 sein',
    'due_date_required'       => 'Fälligkeitsdatum ist erforderlich',
    'reference_year_required' => 'Referenzjahr ist erforderlich',
];
